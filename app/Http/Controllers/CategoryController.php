<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('jobs')->get();
        return json_encode($categories);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        if (request()->wantsJson()) {
            return response([], 204);
        }
    }

    public function update(Request $request, Category $category)
    {
        $validatedInput = $request->validate([
            'name' => 'required | max:255',
        ]);

        $category->update($validatedInput);

        if (request()->wantsJson()) {
            return response([], 200);
        }
    }
}
