<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return 'Hello World!';
});

Route::apiResource('/products', ProductController::class);