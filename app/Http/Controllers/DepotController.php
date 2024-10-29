<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $depot = Depot::first();
        return view('backend.depot.depot', compact('depot'));
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
        $depot = Depot::first();

        if (!$depot) {
            $depot = new Depot();
        }

        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $depot->image = $fileName;
        }
        $depot->save();

        return back()->with('success', 'Company updated successfully');
    }

    // public function store(Request $request)
    // {
    //     $depot = Depot::first();

    //     if (!$depot) {
    //         $depot = new Depot();
    //     }
    //     $depot->location = json_encode($request->only('district', 'address', 'phone'));
    //     $depot->save();
    //     return back()->with('success', 'Company updated successfully');
    // }

    public function store(Request $request)
    {
        $depot = Depot::first();

        // Check if all data in the request is empty
        $requestData = $request->only('district', 'address', 'phone');
        if (empty(array_filter($requestData))) {
            // If all data is empty, delete the depot and return
            if ($depot) {
                $depot->delete();
            }
            return back()->with('success', 'Company deleted successfully');
        }

        // If data is not empty, proceed with updating or creating the depot
        if (!$depot) {
            $depot = new Depot();
        }
        $depot->location = json_encode($requestData);
        $depot->save();

        return back()->with('success', 'Company updated successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Depot $depot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depot $depot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depot $depot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depot $depot)
    {
        //
    }
}
