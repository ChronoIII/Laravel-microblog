<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminApi\AuthController;
use App\Http\Controllers\AdminApi\PostController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->prefix('post')->group(function() {
    Route::get('', [PostController::class, 'index']);
    Route::post('', [PostController::class, 'store']);
});
