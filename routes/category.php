<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])->get('/category', function () {
    return Inertia::render('NewCategory',['categories'=> Category::all()]);
})->name('NewCategory');
