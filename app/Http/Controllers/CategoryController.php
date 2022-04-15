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
}
