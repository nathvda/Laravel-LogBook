<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories/create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request['name']
        ]);

        return redirect()->back()->with('success', 'category added successfully');
    }
}
