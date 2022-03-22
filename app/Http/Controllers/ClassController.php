<?php

namespace App\Http\Controllers;

use App\Models\ClassCourse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Course;

class ClassController extends Controller
{
    public function create(Request $request)
    {
        $ClassCourse = ClassCourse::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'class_link' => $request->input('classLink'),
            'course_id' => $request->input('course_id'),
            'class_order' => $request->input('order')
        ]);
        return Inertia::render('EditCourse', [
            'course' => Course::find($ClassCourse->course_id),
            'classes' => Course::find($ClassCourse->course_id)->classCourse()->orderBy('class_order')->get()
        ]);
    }

    public function update(Request $request)
    {
        $ClassCourse = ClassCourse::find($request->input('class_id'));
        $ClassCourse->name = $request->input('name');
        $ClassCourse->description = $request->input('description');
        $ClassCourse->class_link = $request->input('class_link');
        $ClassCourse->class_order = $request->input('order');
        $ClassCourse->save();
        return Inertia::render('EditCourse', [
            'course' => Course::find($ClassCourse->course_id),
            'classes' => Course::find($ClassCourse->course_id)->classCourse()->orderBy('class_order')->get()
        ]);
    }

    public function delete($id)
    {
        $ClassCourse = ClassCourse::find($id);
        $idCourse = ClassCourse::find($id)->course->id;
        $ClassCourse->delete();
        return Inertia::render('EditCourse', [
            'course' => Course::find($idCourse),
            'classes' => Course::find($idCourse)->classCourse()->orderBy('class_order')->get()
        ]);
    }
}
