<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\ClassCourse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum', 'verified'])
    ->post('/newCourse', "App\Http\Controllers\CourseController@Create")
    ->name("newCourse");

Route::middleware(['auth:sanctum', 'verified'])
    ->put('/editCourse/{id}', "App\Http\Controllers\CourseController@Update")
    ->name("editCourse");

/*navigation */
Route::middleware(['auth:sanctum', 'verified'])->get('/courses', function () {
    return Inertia::render('Courses', ['courses' => Course::all()]);
})->name("courses");
Route::middleware(['auth:sanctum', 'verified'])->get('/newCourse', function () {
    return Inertia::render('NewCourse');
})->name("newCourse");
Route::middleware(['auth:sanctum', 'verified'])->get('/editCourse/{id}', function ($id) {
    return Inertia::render('EditCourse', [
        'course' => Course::find($id),
        'classes' => ClassCourse::where('course_id', intval($id))->orderBy('class_order')->get()
    ]);
})->name("editCourse");


