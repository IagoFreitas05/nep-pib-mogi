<?php
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/forumQuestion', "App\Http\Controllers\ForumController@Create")
    ->name("setForumQuestion");
