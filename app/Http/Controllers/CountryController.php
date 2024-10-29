<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function addCountry()
    {
        $countries = Country::first();
        return view('backend.country.addCountry', get_defined_vars());
    }

    public function storeImage(Request $request)
    {
        $countryImage = Country::first();

        if (!$countryImage) {
            $countryImage = new Country();
        }

        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $countryImage->image = $fileName;
        }
        $countryImage->save();

        return back()->with('success', 'updated successfully');
    }

    public function store(Request $request)
    {
        $country = Country::first();
    
        $requestData = $request->only('name', 'location');
        if (empty(array_filter($requestData))) {
            if ($country) {
                $country->delete();
            }
            return back()->with('success', 'deleted successfully');
        }
    
        // If data is not empty, proceed with updating or creating the country
        if (!$country) {
            $country = new Country();
        }
        $country->country = json_encode($requestData);
        $country->save();
    
        return back()->with('success', 'updated successfully');
    }
}
