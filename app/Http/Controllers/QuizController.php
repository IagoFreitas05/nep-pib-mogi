<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(Request $request){
        Quiz::create([

        ]);
    }
}
