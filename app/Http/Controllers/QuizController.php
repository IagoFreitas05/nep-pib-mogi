<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function create(Request $request){
        Quiz::create([
            "question" => $request->input('question'),
            "order" => $request->input('order'),
            "answer" => $request->input('answer'),
            "module_id" => $request->input('module_id'),
            "course_id" => $request->input('course_id')
        ]);

        return Redirect::route('editCourse', Course::find(
            Module::find(
                $request
                    ->input('module_id'))
                ->course_id));
    }

    public function update(Request $request){
        $quiz = Quiz::find($request->input('id'));
        $quiz->question = $request->input('question');
        $quiz->order = $request->input('order');
        $quiz->answer = $request->input('answer');
        $quiz->save();

        return Redirect::route('editCourse', Course::find(Module::find($quiz->module_id)->course_id));
    }

    public function saveAnswer(Request $request){
        QuizAnswer::create([
            "course_id" => $request->input('course_id'),
            "answer" => $request->input('answer'),
            "question_id" => $request->input('question_id'),
            "module_id" => $request->input('module_id'),
            "user_id" => $request->input('user_id')
        ]);

       return Redirect::route('classes', $request->input('course_id'));
    }
}
