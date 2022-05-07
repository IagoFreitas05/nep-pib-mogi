<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function create(Request $request){
        Quiz::create([
            "question" => $request->input('question'),
            "order" => $request->input('order'),
            "answer" => $request->input('answer'),
            "module_id" => $request->input('module_id')
        ]);

        return Inertia::render('EditCourse', [
            'course' => Course::find(),
            'classes' => Course::find(Module::find('module_id')->course_id)->classCourse()->orderBy('class_order')->get()

        ]);
    }
}
