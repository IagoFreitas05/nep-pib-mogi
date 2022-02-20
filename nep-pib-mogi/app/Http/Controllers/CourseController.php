<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Course;

class CourseController extends Controller
{
    public function Create(Request $request){
        return Course::create([

        ]);
    }
}
