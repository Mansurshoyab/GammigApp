<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.slider.slider', get_defined_vars());
    }

    public function addSlider()
    {
        return view('backend.slider.addSlider');
    }

    public function storeSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

        $slider = new Slider();

        // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $slider->image = $fileName;
        }

        // Handle name
        $slider->caption = $request->input('caption');
        $slider->description = $request->input('description');
        // Save the employee
        $slider->save();

        // Redirect back or wherever you need to go after saving
        return redirect()->back()->with('success', 'Employee created successfully.');
    }

    public function delete(Slider $slider)
    {
        $slider->delete();
        return back()->with('delete_success', 'Delete Successfully.');
    }

    public function edit(Slider $slider)
    {
        return view('backend.slider.editSlider', get_defined_vars());
    }

    public function update(Request $request, Slider $slider)
    {
        // Update the slider with the new data
        $slider->caption = $request->input('caption');
        $slider->description = $request->input('description');
        // Update any other fields as needed

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            // if ($slider->image) {
            //     unlink(public_path('_uploads/' . $slider->image));
            // }
            // Upload the new image
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $slider->image = $fileName;
        }

        // Save the updated slider
        $slider->save();

        // Redirect back or wherever you need to go after updating
        return redirect()->back()->with('success', 'Slider updated successfully.');
    }
}
