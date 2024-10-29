<?php

namespace App\Http\Controllers;

use App\Models\SeedCategory;
use App\Models\SeedProduct;
use Illuminate\Http\Request;

class SeedProductController extends Controller
{
    public function seed_product()
    {
        $products = SeedProduct::with('seedcategory')->get();
        return view('backend.seed_product.seedProduct', get_defined_vars());
    }
    public function addSeedProduct()
    {
        $category = SeedCategory::all();
        return view('backend.seed_product.addSeedProduct', get_defined_vars());
    }

    public function storeSeedProduct(Request $request)
    {
        $porduct = new SeedProduct();
        $porduct->title = $request->title;
        $porduct->slug = $request->slug;
        $porduct->description = json_encode($request->only('material', 'scopeAndDimensions', 'packSize'));
        $porduct->seed_category_id = $request->category;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $fileName = time() . "-" . $request->file('thumbnail')->getClientOriginalName();
            $thumbnail->move(public_path('all/'), $fileName);
            $porduct->thumbnail = $fileName;
        }
        $porduct->save();
        return redirect()->route('seed_product')->with('success', 'Update successfully');
    }

    public function deleteSeedProduct($id)
    {

        $item = SeedProduct::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found');
        }

        $item->delete();

        return redirect()->route('seed_product')->with('delete_success', 'deleted successfully');
    }

    public function editSeedProduct($id)
    {
        $product = SeedProduct::findOrFail($id);
        $category = SeedCategory::all();
        return view('backend.seed_product.editSeedProduct', get_defined_vars());
    }
    
    public function updateSeedProduct(Request $request, $id)
    {
        $product = SeedProduct::findOrFail($id);
    
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->description = json_encode($request->only('material', 'scopeAndDimensions', 'packSize'));
        $product->seed_category_id = $request->category;
    
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $fileName = time() . "-" . $thumbnail->getClientOriginalName();
            $thumbnail->move(public_path('all/'), $fileName);
            $product->thumbnail = $fileName;
        }
    
        $product->save();
    
        return redirect()->route('seed_product')->with('success', 'Seed product updated successfully');
    }
    
}
