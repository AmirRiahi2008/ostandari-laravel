<?php

use Monolog\Handler\NullHandler;

return ['default' => env('LOG_CHANNEL', 'single'), 'deprecations' => ['channel' => 'null', 'trace' => false], 'channels' => [
    'single' => ['driver' => 'single', 'path' => storage_path('logs/laravel.log'), 'level' => env('LOG_LEVEL', 'info'), 'replace_placeholders' => true],
    'null' => ['driver' => 'monolog', 'handler' => NullHandler::class],
]];
