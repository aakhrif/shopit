<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/hello', function () {
    return 'Hello World!';
});

// Temporär in routes/web.php
Route::get('/log-test', function() {
    \Log::debug('Manueller Test');
    return 'Check Terminal';
});

Route::post('/test-image-validation', function (Request $request) {
    try {
        $request->validate(['image' => 'required|string']);
        return 'OK';
    } catch (\Exception $e) {
        // Manueller Log + Response
        \Log::error('Validierungsfehler', $e->errors());
        return response()->json([
            'custom_error' => 'Fehlende Daten',
            'details' => $e->errors()
        ], 422);
    }
});

Route::apiResource('/products', ProductController::class);