<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExportVerinovaData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verinova:export-data {--path= : Path file JSON tujuan export} {--connection= : Koneksi database asal}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export data aplikasi Verinova ke file JSON untuk migrasi aman';

    /**
     * Tabel yang akan diekspor sesuai urutan relasi.
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

        $this->info("Menghubungkan ke database [{$connectionName}]...");

        try {
            $db->getPdo();
        } catch (\Throwable $e) {
            $this->error("Gagal terhubung ke database [{$connectionName}]: " . $e->getMessage());
            return Command::FAILURE;
        }

        $exportData = [
            'meta' => [
                'exported_at' => now()->toIso8601String(),
                'connection' => $connectionName,
                'driver' => $db->getDriverName(),
                'database' => $db->getDatabaseName(),
            ],
            'tables' => [],
        ];

        $summary = [];

        foreach ($this->tables as $table) {
            if (!$db->getSchemaBuilder()->hasTable($table)) {
                $this->warn("Tabel [{$table}] tidak ditemukan di database asal, dilewati.");
                continue;
            }

            $rows = $db->table($table)->orderBy('id')->get()->map(function ($row) {
                return (array) $row;
            })->toArray();

            $exportData['tables'][$table] = $rows;
            $summary[] = [
                'Tabel' => $table,
                'Jumlah Baris' => count($rows),
            ];
        }

        $this->table(['Tabel', 'Jumlah Baris'], $summary);

        $targetPath = $this->option('path') ?: database_path('verinova_data_backup.json');

        // Pastikan direktori tujuan ada
        File::ensureDirectoryExists(dirname($targetPath));

        File::put($targetPath, json_encode($exportData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $fileSize = number_format(filesize($targetPath) / 1024, 2);
        $this->info("✓ Data berhasil diekspor ke: {$targetPath} ({$fileSize} KB)");

        return Command::SUCCESS;
    }
}
