<?php

use App\Models\Course;
use App\Models\Module;
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

/*adicionar rota de edição*/

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/class/{id}', function ($id) {
        return Inertia::render('Classes', [
            'course' => Course::find($id),
            'classes' => Course::find($id)
                ->classCourse()
                ->orderBy('class_order')
                ->get(),
            'modules' => Module::join('class_courses','modules.id','=','class_courses.module_id')
                ->orderBy('class_courses.class_order','asc')
                ->where('modules.course_id','=',$id)
            ->get(['modules.name as module_name','modules.id as id_from_module','class_courses.*'])
        ]);
    })
    ->name("classes");
