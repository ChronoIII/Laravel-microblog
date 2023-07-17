<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminApi\AuthController;
use App\Http\Controllers\AdminApi\UserController;
use App\Http\Controllers\AdminApi\PostController;
use App\Http\Controllers\AdminApi\CommentController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {

    Route::prefix('user')->group(function() {
        Route::get('', [UserController::class, 'index']);
    });

    Route::prefix('post')->group(function() {
        Route::get('', [PostController::class, 'index']);
        Route::post('', [PostController::class, 'store']);
    });

    Route::prefix('comment')->group(function() {
        Route::post('', [CommentController::class, 'store']);
    });

});
