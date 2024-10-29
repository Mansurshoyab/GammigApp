<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('backend.category.category', get_defined_vars());
    }

    public function addCategory()
    {
        $categories  = Category::where('parent_id', null)->get();
        return view('backend.category.addCategory', get_defined_vars());
    }

    public function storeCategory(Request $request)
    {

        // dd($request->all());
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('category')->with('success', 'store successfully');
    }

    public function deleteCategory($id)
    {
        $item = Category::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found');
        }

        $item->delete();

        return redirect()->route('category')->with('delete_success', 'deleted successfully');
    }
}
