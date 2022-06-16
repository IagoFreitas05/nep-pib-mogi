<?php

use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\WatchedClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    ->post('/newClass', "App\Http\Controllers\ClassController@Create")
    ->name("newClass");

Route::middleware(['auth:sanctum', 'verified'])
    ->delete('/deleteClass/{id}', 'App\Http\Controllers\ClassController@Delete')
    ->name("deleteClass");

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/setWatchedClass', 'App\Http\Controllers\ClassController@setWatchedClass')
    ->name("setWatchedClass");

/*adicionar rota de edição*/

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/class/{id}', function ($id) {
        return Inertia::render('Classes', [
            'course' => Course::find($id),
            'classes' => Course::find($id)
                ->classCourse()
                ->orderBy('class_order')
                ->get(),
            'modules' => Module::with('class')
                ->where('course_id', '=', $id)
                ->orderBy('module_order')
                ->get(),
            'quizzes' => Quiz::where('course_id', '=', $id)
                ->orderBy('order', 'desc')
                ->get(),
            'watched_class' => WatchedClass::where('user_id', '=', Auth::user()->id)->get()
        ]);
    })
    ->name("classes");
