<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetPostgresSequences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verinova:reset-sequences {--connection= : Koneksi database PostgreSQL}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menyesuaikan sequence PostgreSQL (id auto-increment) setelah impor data';

    /**
     * Daftar tabel yang memiliki primary key id serial/bigserial.
     */
    protected array $tables = [
        'users',
        'class_profiles',
        'students',
        'organizations',
        'schedules',
        'galleries',
        'achievements',
        'class_infos',
        'duty_schedules',
    ];

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $connectionName = $this->option('connection') ?: config('database.default');
        $db = DB::connection($connectionName);

        if ($db->getDriverName() !== 'pgsql') {
            $this->info("Koneksi [{$connectionName}] menggunakan driver [{$db->getDriverName()}]. Penyesuaian sequence hanya berlaku untuk PostgreSQL.");
            return Command::SUCCESS;
        }

        $this->info("Menyesuaikan primary key sequences di PostgreSQL [{$connectionName}]...");

        $results = [];

        foreach ($this->tables as $table) {
            if (!$db->getSchemaBuilder()->hasTable($table)) {
                continue;
            }

            try {
                // Cari sequence untuk kolom id tabel
                $seqRow = $db->selectOne("SELECT pg_get_serial_sequence(?, 'id') AS seq", [$table]);
                $seqName = $seqRow ? $seqRow->seq : null;

                if (!$seqName) {
                    $results[] = [
                        'Tabel' => $table,
                        'Sequence' => 'Tidak ditemukan',
                        'Max ID' => '-',
                        'Status' => 'Dilewati',
                    ];
                    continue;
                }

                $maxId = $db->table($table)->max('id') ?? 0;

                if ($maxId > 0) {
                    // Set sequence ke MAX(id), is_called = true
                    $db->statement("SELECT setval(?, ?, true)", [$seqName, $maxId]);
                } else {
                    // Jika tabel kosong, setval ke 1 dengan is_called = false (agar nextval menghasilkan 1)
                    $db->statement("SELECT setval(?, 1, false)", [$seqName]);
                }

                $results[] = [
                    'Tabel' => $table,
                    'Sequence' => $seqName,
                    'Max ID' => $maxId,
                    'Status' => '✓ Diperbarui',
                ];
            } catch (\Throwable $e) {
                $results[] = [
                    'Tabel' => $table,
                    'Sequence' => '-',
                    'Max ID' => '-',
                    'Status' => 'Gagal: ' . $e->getMessage(),
                ];
            }
        }

        $this->table(['Tabel', 'Sequence', 'Max ID', 'Status'], $results);
        $this->info("✓ Penyesuaian sequence PostgreSQL selesai.");

        return Command::SUCCESS;
    }
}
