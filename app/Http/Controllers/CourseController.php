<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function Create(Request $request){
         Course::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'duration' => $request->input('duration')
        ]);

        return redirect('courses');
    }

    public function Update(Request $request){
        $course = Course::find($request->input('id'));
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->save();
        return inertia::render('editCourse');
    }
}
