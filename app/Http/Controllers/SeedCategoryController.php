<?php

namespace App\Http\Controllers;

use App\Models\SeedCategory;
use Illuminate\Http\Request;

class SeedCategoryController extends Controller
{
    public function seed_category()
    {
        $categories = SeedCategory::all();
        return view('backend.seed_category.seed_category', get_defined_vars());
    }

    public function addSeed_category()
    {
        $categories  = SeedCategory::where('parent_id', null)->get();
        return view('backend.seed_category.addSeed_category', get_defined_vars());
    }

    public function storeSeed_category(Request $request)
    {
        $category = new SeedCategory();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('seed_category')->with('success', 'store successfully');
    }

    public function deleteSeed_category($id)
    {
        $item = SeedCategory::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found');
        }

        $item->delete();

        return redirect()->route('seed_category')->with('delete_success', 'Item deleted successfully');
    }
}
