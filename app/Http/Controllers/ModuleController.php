<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModuleController extends Controller
{
    public function create(Request $request){
        return  Module::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course_id')
        ]);
    }
}
