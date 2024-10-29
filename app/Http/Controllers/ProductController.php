<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $query = Product::with('category');
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('price', 'like', "%{$search}%")
                  ->orWhereHas('category', function($q) use ($search) {
                      $q->where('title', 'like', "%{$search}%");
                  });
        }
    
        $products = $query->paginate(10);
    
        return view('backend.product.product', compact('products'));
    }
    
    

    public function addProduct()
    {
        $category = Category::all();
        return view('backend.product.addProduct', get_defined_vars());
    }
    public function storeProduct(Request $request)
    {
        // $validator = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'slug' => 'required|string|max:255|unique:products,slug',
        //     'description' => 'nullable|string',
        // ]);

        $product = new Product();
        $product->title = $request->title;
        // $product->slug = Str::slug($request->title, '-');
        $product->slug = Str::slug($request->slug, '-');
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;

        if ($request->hasFile('thumbnail')) {
            $thumbnailName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('_uploads'), $thumbnailName);
            $product->thumbnail = $thumbnailName;
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $imageName);
            $product->image = $imageName;
        }

        // dd($product);
        $product->save();

        return redirect()->route('product')->with('success', 'Product added successfully!');
    }

    public function editProduct($id)
    {

        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('backend.product.editProduct', get_defined_vars());
    }

    public function updateProduct(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|max:100|unique:products,title,' . $id,
        //     'slug' => 'required|max:150|unique:products,slug,' . $id,
        //     'price' => 'required|max:100',
        //     'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'packSize' => 'nullable|string',
        //     'category' => 'nullable|exists:categories,id',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //                      ->withErrors($validator)
        //                      ->withInput();
        // }

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;

        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($product->thumbnail && file_exists(public_path('_uploads') . '/' . $product->thumbnail)) {
                unlink(public_path('_uploads') . '/' . $product->thumbnail);
            }

            $thumbnailName = time() . '-' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move(public_path('_uploads'), $thumbnailName);
            $product->thumbnail = $thumbnailName;
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path('_uploads') . '/' . $product->image)) {
                unlink(public_path('_uploads') . '/' . $product->image);
            }

            $imageName = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('admin.dashboard')->with('success', 'Product updated successfully!');
    }

    public function deleteProduct($id)
    {
        $item = Product::find($id);
        if (!$item) {
            return back()->with('error', 'Item not found');
        }
        $item->delete();
        return redirect()->route('product')->with('delete_success', 'Item deleted successfully');
    }
}
