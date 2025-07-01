<?php

use Illuminate\Support\Facades\Artisan;

require __DIR__.'/../todolist_laravel/vendor/autoload.php';

$app = require_once __DIR__.'/../todolist_laravel/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Jalankan perintah artisan
Artisan::call('cache:clear');
Artisan::call('config:clear');
Artisan::call('route:clear');
Artisan::call('view:clear');

echo "Cache cleared!";
