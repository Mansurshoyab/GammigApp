<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $social_linkes = json_decode($company->social_media);
        return view('backend.appearance.company', get_defined_vars());
    }

    // public function update(Request $request)
    // {
    //     // dd($request);
    //     $company = new Company;
    //     $company->findOrNew();
    //     $company->name = $request->name;
    //     $company->tagline = $request->tagline;

    //     $company->name = $request->name;
    //     $company->name = $request->name;
    //     $company->social_media = json_encode($request->only('facebook', 'youtube', 'linkedine', 'instagram'));
    //     $company->email = $request->email;
    //     $company->phone = $request->phone;
    //     $company->telephone = $request->telephone;
    //     $company->webSite = $request->webSite;

    //     if ($request->hasFile('logo')) && ($request->hasFile('favicon')) {
    //         $logo = $request->file('logo');
    //         $logoName = time() . "-" . $request->file('logo')->getClientOriginalName();
    //         $logo->move(public_path('all/'), $logo);
    //     }

    //     $company->address = $request->address;
    //     $company->map = $request->map;
    //     $company->update();
    // }

    public function update(Request $request)
    {

        $company = Company::first();
        
        if (!$company) {
                $company = new Company();
            }
            
        $company->name = $request->name;
        $company->tagline = $request->tagline;
        $company->social_media = json_encode($request->only('facebook', 'youtube', 'linkedine', 'instagram'));
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->telephone = $request->telephone;
        $company->webSite = $request->webSite;
        $company->address = $request->address;
        $company->map = $request->map; 

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . "-" . $request->file('logo')->getClientOriginalName();
            $logo->move(public_path('all/'), $logoName);
            $company->logo = $logoName;
        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = time() . "-" . $request->file('favicon')->getClientOriginalName();
            $favicon->move(public_path('all/'), $faviconName);
            $company->favicon = $faviconName;
        }

        $company->save();
        return back()->with('success', 'Company updated successfully');
    }
}
