<?php

use App\Http\Controllers\ChatbotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('throttle:60,1')->group(function () {
    Route::prefix('chatbot')->group(function () {
        Route::get('/status', [ChatbotController::class, 'status']);
        Route::post('/chat', [ChatbotController::class, 'chat']);
    });
});