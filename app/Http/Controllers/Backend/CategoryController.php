<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->paginate(3);
        return view('backend.category.index', ['category' => $category]);
    }

    public function addCategory()
    {
        return view('backend.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new Category();
        $category->cat_name = $request->name;
        $category->save();

        return Redirect()->route('categories')->with('message', 'Your Category has been publish successfully!');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', ['category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->cat_name = $request->name;
        $category->save();

        return Redirect()->route('categories')->with('message', 'Your Category has been Update successfully!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect()->route('categories')->with('message', 'Your Category has been Deleted successfully!');
    }
}
