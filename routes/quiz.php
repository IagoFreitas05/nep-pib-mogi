<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newQuiz', "App\Http\Controllers\QuizController@Create")
    ->name("newQuiz");
