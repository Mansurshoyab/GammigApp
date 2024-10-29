<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    public function index()
    {
        $distributions = Distribution::all();
        return view('backend.distribution-point.distribution', get_defined_vars());
    }

    public function addDistribution()
    {
        return view('backend.distribution-point.addDistribution');
    }

    public function storeDistribution(Request $request)
    {
        $distribution = new Distribution();
        $distribution->title = $request->title;
        $distribution->address1 = $request->address1;
        $distribution->address2 = $request->address2;
        $distribution->contact = $request->contact;
        $distribution->landline = $request->landline;
        $distribution->save();
        return redirect()->back();
    }

    public function deleteDistribution($id)
    {
        $item = Distribution::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found');
        }

        $item->delete();
        return redirect()->route('Distribution')->with('delete_success', 'Item deleted successfully');
    }

    public function editDistribution(Distribution $distribution)
    {
        return view('backend.distribution-point.editDistribution',  get_defined_vars());
    }


    public function updateDistribution(Request $request, $id)
    {
        $distribution = Distribution::find($id);

        if (!$distribution) {
            return back()->with('error', 'Distribution not found');
        }

        $distribution->title = $request->title;
        $distribution->address1 = $request->address1;
        $distribution->address2 = $request->address2;
        $distribution->contact = $request->contact;
        $distribution->landline = $request->landline;
        $distribution->save();

        return redirect()->route('Distribution')->with('update_success', 'Distribution updated successfully');
    }
}
