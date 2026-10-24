<?php

// Cross-platform setup for an existing MySQL database, without Node or Docker.
chdir(dirname(__DIR__));
if (version_compare(PHP_VERSION, '8.4.0', '<')) {
    fwrite(STDERR, 'PHP 8.4 or later is required. Current version: '.PHP_VERSION."\n");
    exit(1);
}
if (! is_file('vendor/autoload.php')) {
    fwrite(STDERR, "Run composer install first.\n");
    exit(1);
}
require 'vendor/autoload.php';
foreach (['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'fileinfo', 'xml', 'ctype'] as $extension) {
    if (! extension_loaded($extension)) {
        fwrite(STDERR, "Missing PHP extension: {$extension}\n");
        exit(1);
    }
}
if (! is_file('.env')) {
    copy('.env.example', '.env');
}
$env = file_get_contents('.env');
$values = \Dotenv\Dotenv::parse($env);
$get = fn ($key, $fallback = '') => $values[$key] ?? $fallback;
if ($get('DB_CONNECTION', 'mysql') !== 'mysql') {
    fwrite(STDERR, "Set DB_CONNECTION=mysql and your MySQL credentials in .env.\n");
    exit(1);
}
foreach (['bootstrap/cache', 'storage/framework/cache/data', 'storage/framework/sessions', 'storage/framework/views', 'storage/logs', 'storage/app/public', 'storage/app/private'] as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}
// Use an argument array: credentials never appear in command-line arguments.
$run = function (array $args) {
    $process = proc_open([PHP_BINARY, 'artisan', ...$args], [0 => STDIN, 1 => STDOUT, 2 => STDERR], $pipes);
    if (! is_resource($process) || proc_close($process) !== 0) {
        exit(1);
    }
};
$run(['config:clear']);
if (! $get('APP_KEY')) {
    if (! array_key_exists('APP_KEY', $values)) {
        file_put_contents('.env', rtrim($env)."\nAPP_KEY=\n");
    }
    $run(['key:generate', '--force']);
    $updated = \Dotenv\Dotenv::parse(file_get_contents('.env'));
    if (empty($updated['APP_KEY'])) {
        fwrite(STDERR, "Could not generate APP_KEY. Check that .env is writable.\n");
        exit(1);
    }
}
$run(['migrate', '--force']);
$run(['db:seed', '--force']);
if (! file_exists('public/storage')) {
    $run(['storage:link']);
}
echo "\nReady. Site: ".$get('APP_URL', 'http://127.0.0.1:8000')."\nAdmin login: /panel/admin/login\n";
echo "Accounts and password hashes are read from the database. Existing credentials were not reset.\n";
echo "Import your users from SQL, or create a new administrator: php artisan portal:admin-create\n";
echo "Start: php artisan serve\n";
