<?php
    Route::middleware(['auth:sanctum', 'verified'])
        ->post('/newModule', "App\Http\Controllers\ModuleController@Create")
        ->name("newCategory");
