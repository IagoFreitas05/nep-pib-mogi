<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function create(Request $request){
         $ModuleCourse = Module::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course_id')
        ]);

        return Inertia::render('EditCourse', [
            'course' => Course::find($ModuleCourse->course_id),
            'classes' => Course::find($ModuleCourse->course_id)->classCourse()->orderBy('class_order')->get()
        ]);
    }
}
