<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {

        $subcategory = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', 'categories.id')
            ->select('sub_categories.*', 'categories.cat_name')
            ->orderBy('id', 'desc')->paginate('2');

        return view('backend.subcategory.index', [
            'subcategory' => $subcategory
        ]);
    }

    public function addSubCategory()
    {
        $category = Category::all();
        return view('backend.subcategory.create', ['category' => $category]);
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return Redirect()->route('subcategories')->with('message', 'Your Sub-Category has been publish successfully!');
    }

    public function editSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $category = Category::all();
        return view('backend.subcategory.edit', [
            'subcategory' => $subcategory,
            'category' => $category,
        ]);
    }

    public function updateSubCategory(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return Redirect()->route('subcategories')->with('message', 'Your Sub-Category has been Updated successfully!');
    }

    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return Redirect()->route('subcategories')->with('message', 'Your Sub-Category has been Updated successfully!');
    }
}
