<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AuthController;

Route::resource('questions', QuestionController::class);

Route::view('/', 'login');
Route::view('/login', 'login');
Route::view('/register', 'register');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
