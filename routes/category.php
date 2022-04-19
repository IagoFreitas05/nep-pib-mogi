<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])->get('/category', function () {
    return Inertia::render('NewCategory',['categories'=> Category::all()]);
})->name('category');

Route::middleware(['auth:sanctum', 'verified'])
    ->put('/editCategory/{id}', "App\Http\Controllers\CategoryController@Update")
    ->name("editCategory");

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newCategory', "App\Http\Controllers\CategoryController@Create")
    ->name("newCategory");

