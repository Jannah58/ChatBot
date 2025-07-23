<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

Route::get('/', function () {
    return view('welcome');
});

// Chatbot routes
Route::get('/chatbot', [ChatbotController::class, 'index'])->name('chatbot.index');
Route::post('/chatbot/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');
Route::get('/chatbot/history', [ChatbotController::class, 'history'])->name('chatbot.history');
Route::post('/chatbot/clear', [ChatbotController::class, 'clear'])->name('chatbot.clear');
Route::get('/chatbot/health', [ChatbotController::class, 'healthCheck'])->name('chatbot.health');
