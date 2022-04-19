<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function Create(Request $request)
    {
        Category::create([
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'status' => $request->input('status')
        ]);

        return redirect('category');
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

    public function ToggleCategory(Request $request){
        $category = Category::find($request->input('category_id'));
        $category->status = $category->status == 0 ? 1 : 0;
        $category->save();
        return redirect('category');
    }
}
