<?php
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newModule', "App\Http\Controllers\CategoryController@Create")
    ->name("newCategory");
