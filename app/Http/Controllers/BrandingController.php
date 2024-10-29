<?php

namespace App\Http\Controllers;

use App\Models\Branding;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    public function index()
    {
        $brandings = Branding::all();
        return view('backend.branding.branding', get_defined_vars());
    }

    public function addBranding()
    {
        return view('backend.branding.addBranding');
    }
    public function store(Request $request)
    {
        $branding = new Branding();

        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $branding->image = $fileName;
        }

        $branding->title = $request->title;
        $branding->description = $request->description;
        $branding->save();

        return redirect()->route('branding')->with('success', 'Branding created successfully.');
    }

    public function delete($id)
    {
        $branding = Branding::findOrFail($id);

        $branding->delete();
        return redirect()->route('branding')->with('success', 'Branding deleted successfully.');
    }
}
