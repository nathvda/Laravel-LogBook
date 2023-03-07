<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;

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

    public function destroy(DeleteCategoryRequest $request){

        Category::find($request['category_id'])->delete();

        return redirect('/dashboard');
    }

}
