<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForumController extends Controller
{
    public function create(Request $request){

        Forum::create([
            'course_id' => $request->input('course_id'),
            'class_id' => $request->input('class_id'),
            'question' => $request->input('question'),
            'user_id' => Auth::user()->id,
            'username' => Auth::user()->name
        ]);

        return Redirect::route('classes', $request->input('course_id'));
    }

    public function update(Request $request){
        $forum = Forum::find($request->input('forum_id'));
        $forum->answer = $request->input('answer');
        $forum->save();
    }
}
