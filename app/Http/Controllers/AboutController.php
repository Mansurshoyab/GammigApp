<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('backend.about_us.aboutUs', compact('abouts'));
    }

    public function addAbout()
    {
        return view('backend.about_us.addAboutUs');
    }

    // public function storeAbout(Request $request)
    // { 

    //     $about = new About();
    //     $about->description = $request->description;

    //     if ($request->hasfile('image')) {
    //         foreach ($request->file('image') as $file) {
    //             $name = time() . '_' . $file->getClientOriginalName();
    //             $file->move(public_path('images'), $name);
    //             $data[] = $name;
    //         }
    //         $about->images = json_encode($data);
    //     }

    //     $about->save();

    //     return redirect()->back()->with('success', 'About section updated successfully!');
    // }


    public function storeAbout(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $about = $request->id ? About::find($request->id) : new About();
        
        if (!$about) {
            return redirect()->back()->with('error', 'About section not found.');
        }
    
        $about->description = $request->description;
        if ($request->hasFile('image')) {
            $existingImages = $about->images ? json_decode($about->images, true) : [];
            $newImages = [];
    
            foreach ($request->file('image') as $file) {
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $name);
                $newImages[] = $name;
            }
    
            $allImages = array_merge($existingImages, $newImages);
            $about->images = json_encode($allImages);
        }
    
        $about->save();
    
        return redirect()->back()->with('success', 'About section updated successfully!');
    }
    


    public function deleteImage(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'image' => 'required|string',
        ]);
    
        $about = About::find($request->id);
    
        if ($about) {
            $images = json_decode($about->images, true);
            $images = array_filter($images, function($img) use ($request) {
                return $img !== $request->image;
            });
    
            $about->images = !empty($images) ? json_encode($images) : null;
            $about->save();
    
            // Remove image from disk
            $imagePath = public_path('images/' . $request->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
    
            return response()->json(['success' => 'Image deleted successfully.']);
        }
    
        return response()->json(['error' => 'Image not found.'], 404);
    }
    
}
