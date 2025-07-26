<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Blog Routes
Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/about', [BlogController::class, 'about'])->name('blog.about');

// Chatbot Routes
Route::prefix('chatbot')->group(function () {
    Route::get('/status', [ChatbotController::class, 'status'])->name('chatbot.status');
    Route::post('/chat', [ChatbotController::class, 'chat'])->name('chatbot.chat');
});