<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/gettoken', [\App\Http\Controllers\Api\AuthController::class, 'getToken'])->middleware(['throttle:api']);

Route::get('/tenders', [\App\Http\Controllers\Api\TenderController::class, 'getAll'])->middleware(['throttle:api', 'auth:sanctum']);

Route::get('/tenders/sort/{sortBy}', [\App\Http\Controllers\Api\TenderController::class, 'getAll'])->middleware(['throttle:api', 'auth:sanctum']);

Route::get('/tenders/{extCode}', [\App\Http\Controllers\Api\TenderController::class, 'getTender'])->middleware(['throttle:api', 'auth:sanctum']);

Route::post('/tenders', [\App\Http\Controllers\Api\TenderController::class, 'create'])->middleware(['throttle:api', 'auth:sanctum']);
