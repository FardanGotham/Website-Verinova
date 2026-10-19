<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportVerinovaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verinova:import-data 
                            {--path= : Path file JSON sumber data} 
                            {--connection= : Koneksi database tujuan} 
                            {--truncate : Kosongkan tabel tujuan sebelum impor} 
                            {--force : Lewati konfirmasi interaktif}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Impor data aplikasi Verinova dari file JSON ke database tujuan secara aman';

    /**
     * Urutan penyisipan tabel dengan memperhatikan foreign key:
     * students harus masuk sebelum duty_schedules.
     */
    protected array $insertOrder = [
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

        $sourcePath = $this->option('path') ?: database_path('verinova_data_backup.json');

        if (!File::exists($sourcePath)) {
            $this->error("File backup tidak ditemukan: {$sourcePath}");
            $this->info("Silakan jalankan 'php artisan verinova:export-data' terlebih dahulu saat terhubung ke database MySQL.");
            return Command::FAILURE;
        }

        $jsonContent = File::get($sourcePath);
        $payload = json_decode($jsonContent, true);

        if (!$payload || !isset($payload['tables'])) {
            $this->error("Format file backup JSON tidak valid.");
            return Command::FAILURE;
        }

        $this->warn("==================================================");
        $this->warn(" Target Database: [{$connectionName}]");
        $this->warn(" Driver:          [{$db->getDriverName()}]");
        $this->warn(" Database Name:   [{$db->getDatabaseName()}]");
        $this->warn(" Host:            [" . ($db->getConfig('host') ?? 'N/A') . "]");
        $this->warn(" File Sumber:     [{$sourcePath}]");
        $this->warn("==================================================");

        if (!$this->option('force')) {
            if (!$this->confirm('Apakah Anda yakin ingin mengimpor data ke database di atas?', true)) {
                $this->info("Impor dibatalkan oleh pengguna.");
                return Command::SUCCESS;
            }
        }

        try {
            $db->getPdo();
        } catch (\Throwable $e) {
            $this->error("Gagal terhubung ke database tujuan: " . $e->getMessage());
            return Command::FAILURE;
        }

        // Jalankan import dalam transaksi database
        try {
            $db->beginTransaction();

            // Jika opsi truncate diaktifkan, kosongkan dalam urutan terbalik
            if ($this->option('truncate')) {
                $this->info("Mengosongkan tabel lama sebelum impor...");
                $reverseOrder = array_reverse($this->insertOrder);
                foreach ($reverseOrder as $table) {
                    if ($db->getSchemaBuilder()->hasTable($table)) {
                        $db->table($table)->delete();
                    }
                }
            }

            $summary = [];

            foreach ($this->insertOrder as $table) {
                if (!isset($payload['tables'][$table])) {
                    continue;
                }

                if (!$db->getSchemaBuilder()->hasTable($table)) {
                    $this->warn("Tabel [{$table}] belum ada di database tujuan. Pastikan telah menjalankan 'php artisan migrate'.");
                    continue;
                }

                $rows = $payload['tables'][$table];
                $inserted = 0;

                $firstRow = $rows[0] ?? [];
                $columnsToUpdate = array_diff(array_keys($firstRow), ['id']);

                // Masukkan atau perbarui data per chunk untuk efisiensi dan idempotensi
                foreach (array_chunk($rows, 100) as $chunk) {
                    if (!empty($columnsToUpdate)) {
                        $db->table($table)->upsert($chunk, ['id'], $columnsToUpdate);
                    } else {
                        $db->table($table)->upsert($chunk, ['id']);
                    }
                    $inserted += count($chunk);
                }

                $summary[] = [
                    'Tabel' => $table,
                    'Baris Backup' => count($rows),
                    'Berhasil Diimpor' => $inserted,
                ];
            }

            $db->commit();
            $this->table(['Tabel', 'Baris Backup', 'Berhasil Diimpor'], $summary);
            $this->info("✓ Seluruh data berhasil diimpor.");

        } catch (\Throwable $e) {
            $db->rollBack();
            $this->error("Terjadi kesalahan saat impor data. Transaksi di-rollback!");
            $this->error("Pesan error: " . $e->getMessage());
            return Command::FAILURE;
        }

        // Jika tujuan adalah PostgreSQL, otomatis sesuaikan sequences
        if ($db->getDriverName() === 'pgsql') {
            $this->info("\nOtomatis menyesuaikan PostgreSQL sequences...");
            $this->call('verinova:reset-sequences', [
                '--connection' => $connectionName,
            ]);
        }

        return Command::SUCCESS;
    }
}
