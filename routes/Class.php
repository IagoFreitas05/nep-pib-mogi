<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Course;

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

/*adicionar rota de edição*/
