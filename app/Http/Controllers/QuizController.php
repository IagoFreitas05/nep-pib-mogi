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
            'classes' => Course::find(Module::find($request->input('module_id'))->course_id)->classCourse()->orderBy('class_order')->get()
        ]);
    }

    public function update(Request $request){
        $quiz = Quiz::find($request->input('id'));
        $quiz->question = $request->input('question');
        $quiz->order = $request->input('order');
        $quiz->answer = $request->input('answer');
        $quiz->save();

        return Inertia::render('EditCourse', [
            'course' => Course::find(),
            'classes' => Course::find(Module::find($quiz->module_id)->course_id)->classCourse()->orderBy('class_order')->get()
        ]);
    }
}
