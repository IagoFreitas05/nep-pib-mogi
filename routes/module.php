<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newModule', "App\Http\Controllers\ModuleController@Create")
    ->name("newModule");
