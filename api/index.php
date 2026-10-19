<?php

/**
 * Entry point untuk Serverless Function Vercel
 * Menghubungkan request Vercel ke public/index.php Laravel
 */

$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Teruskan eksekusi ke front controller Laravel
require __DIR__ . '/../public/index.php';
