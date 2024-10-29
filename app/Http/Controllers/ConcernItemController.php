<?php

namespace App\Http\Controllers;

use App\Models\ConcernItem;
use Illuminate\Http\Request;

class ConcernItemController extends Controller
{
    public function index(){
        $items = ConcernItem::all();
        return view('backend.concern_item.concern_item', get_defined_vars());
    }
    public function add_concern_item(){
        return view('backend.concern_item.add_concern_item');
    }

    public function store(Request $request){
        // Create a new ConcernItem instance
        $item = new ConcernItem();
    
        // Extracting form data from the request
        $item->title = $request->input('title');
        $item->description = $request->input('description');
        $item->section = $request->input('section');
        
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $item->image = $imageName;
        }
    
        // Save the item to the database
        $item->save();
    
        // Redirect the user after successful submission
        return redirect()->back()->with('success', 'store successfully');
    }

    public function delete($id){
        // Find the item by its ID
        $item = ConcernItem::findOrFail($id);
    
        // Delete the item from the database
        $item->delete();
    
        // Redirect the user after successful deletion
        return redirect()->back()->with('delete_success', 'deleted successfully'); // Redirect back to the previous page with a success message
    }
}
