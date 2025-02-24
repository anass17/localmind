<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Middleware\UserAuthentified;

Route::resource('questions', QuestionController::class)->middleware(UserAuthentified::class);
Route::resource('answers', AnswerController::class)->only('store');

Route::view('/', 'login');
Route::view('/login', 'login') -> name('login');
Route::view('/register', 'register');
Route::get('/logout', [AuthController::class, 'logout']) -> name('logout');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
