<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $Validated = $request->validate([
            'name' => ['required', 'unique:categories'],
            'description' => ['required'],
            'status' => ['required']
        ]);

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);

        return inertia::render('NewCategory');
    }

    public function Update(Request $request)
    {
        $category = Category::find($request->input('id'));
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        $category->save();
        return inertia::render('NewCategory', ['categories' => Category::all()]);
    }
}
