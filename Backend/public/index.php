<!-- public/index.php
| -- Entry point for the Laravel application
 -->
<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// Check if the application is under maintenance made 
if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

// Require the Composer autoloader
require __DIR__.'/../vendor/autoload.php';

// Register the Composer autoloader 
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incomming request 
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

// Terminate the request and send the response back to the client
$kernel->terminate($request, $response);




