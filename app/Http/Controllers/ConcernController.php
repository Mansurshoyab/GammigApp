<?php

namespace App\Http\Controllers;

use App\Models\Concern;
use Illuminate\Http\Request;

class ConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $concern = Concern::first();
        $linkes = json_decode($concern->concern_link);
        return view('backend.concern.concern', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

     public function storeImage(Request $request)
     {
         $concern = Concern::first();
 
         if (!$concern) {
             $concern = new Concern();
         }
 
         if ($request->hasFile('image')) {
             $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
             $request->file('image')->move(public_path('_uploads'), $fileName);
             $concern->image = $fileName;
         }
         $concern->save();
 
         return back()->with('success', 'Company updated successfully');
     }

    public function store(Request $request)
    {
        $concern = Concern::first();

        $requestData = $request->only('title', 'link');
        if (empty(array_filter($requestData))) {
            if ($concern) {
                $concern->delete();
            }
            return back()->with('success', 'Company deleted successfully');
        }
        if (!$concern) {
            $concern = new Concern();
        }
        $concern->concern_link = json_encode($requestData);
        $concern->save();

        return back()->with('success', 'Company updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Concern $concern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concern $concern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concern $concern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concern $concern)
    {
        //
    }
}
