<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    public function create(Request $request)
    {
        $ModuleCourse = Module::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'course_id' => $request->input('course_id'),
            'module_id' => $request->input('module_id')
        ]);

        return Redirect::route('editCourse', $request->input('course_id'));
    }
}
