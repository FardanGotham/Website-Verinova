<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\DutySchedule;
use App\Models\User;

class VerifyVerinovaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verinova:verify-data {--connection= : Koneksi database yang akan dicek}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifikasi kesehatan data, jumlah record, dan integritas relasi';

    protected array $tables = [
        'users' => 'Data Pengguna / Admin',
        'class_profiles' => 'Profil Kelas',
        'students' => 'Data Siswa',
        'organizations' => 'Struktur Organisasi',
        'schedules' => 'Jadwal Pelajaran',
        'galleries' => 'Galeri Foto',
        'achievements' => 'Data Prestasi',
        'class_infos' => 'Informasi & Tugas Kelas',
        'duty_schedules' => 'Jadwal Piket',
        'sessions' => 'Sesi Login Aktif',
        'migrations' => 'Riwayat Migrasi',
    ];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $connectionName = $this->option('connection') ?: config('database.default');
        $db = DB::connection($connectionName);

        $this->info("==================================================");
        $this->info(" Memeriksa Koneksi & Data Database: [{$connectionName}]");
        $this->info(" Driver: " . $db->getDriverName());
        $this->info(" Database: " . $db->getDatabaseName());
        $this->info("==================================================");

        try {
            $db->getPdo();
            $this->info("✓ Koneksi database berhasil!");
        } catch (\Throwable $e) {
            $this->error("✗ Gagal terhubung ke database: " . $e->getMessage());
            return Command::FAILURE;
        }

        $rows = [];
        foreach ($this->tables as $table => $desc) {
            $exists = $db->getSchemaBuilder()->hasTable($table);
            if ($exists) {
                $count = $db->table($table)->count();
                $rows[] = [
                    'Tabel' => $table,
                    'Keterangan' => $desc,
                    'Status Tabel' => '✓ Ada',
                    'Jumlah Baris' => $count,
                ];
            } else {
                $rows[] = [
                    'Tabel' => $table,
                    'Keterangan' => $desc,
                    'Status Tabel' => '✗ Belum Ada',
                    'Jumlah Baris' => 0,
                ];
            }
        }

        $this->table(['Tabel', 'Keterangan', 'Status Tabel', 'Jumlah Baris'], $rows);

        // Uji integritas relasi foreign key duty_schedules ke students
        $this->info("\nMemeriksa integritas foreign key Jadwal Piket...");
        if ($db->getSchemaBuilder()->hasTable('duty_schedules') && $db->getSchemaBuilder()->hasTable('students')) {
            $orphanCount = $db->table('duty_schedules')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))->from('students')->whereColumn('students.id', 'duty_schedules.student_1');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))->from('students')->whereColumn('students.id', 'duty_schedules.student_2');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))->from('students')->whereColumn('students.id', 'duty_schedules.student_3');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))->from('students')->whereColumn('students.id', 'duty_schedules.student_4');
                })
                ->orWhereNotExists(function ($query) {
                    $query->select(DB::raw(1))->from('students')->whereColumn('students.id', 'duty_schedules.student_5');
                })
                ->count();

            if ($orphanCount === 0) {
                $this->info("✓ Seluruh relasi siswa pada jadwal piket valid (tidak ada orphan record).");
            } else {
                $this->warn("⚠ Ditemukan {$orphanCount} jadwal piket dengan ID siswa yang tidak terdaftar di tabel students.");
            }
        }

        // Cek Admin User
        if ($db->getSchemaBuilder()->hasTable('users')) {
            $adminCount = $db->table('users')->whereIn('role', ['admin', 'super_admin'])->count();
            if ($adminCount > 0) {
                $this->info("✓ Ditemukan {$adminCount} akun Admin/Super Admin siap digunakan untuk login.");
            } else {
                $this->warn("⚠ Belum ada akun Admin di tabel users. Pastikan Anda telah memiliki akun login.");
            }
        }

        $this->info("\n✓ Verifikasi database selesai.");
        return Command::SUCCESS;
    }
}
