<?php

use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newQuiz', "App\Http\Controllers\QuizController@Create")
    ->name("newQuiz");

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/index', function(){
        return Quiz::All();
    })->name("indexQuiz");
