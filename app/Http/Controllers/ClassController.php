<?php

namespace App\Http\Controllers;

use App\Models\ClassCourse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClassController extends Controller
{
    public function post(Request $request){
        ClassCourse::create([
            'name' => $request->input('name'),
            'description'=> $request->input('description'),
            'class_link'=> $request->input('classLink'),
            'course_id'=> $request->input('course_id')
        ]);
        return inertia::render('editCourse');

    }
}
