<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Carrer;
use Illuminate\Http\Request;

class CarrerController extends Controller
{
    public function index()
    {
        $jobs = Carrer::all();
        return view('backend.carrer.carrer', get_defined_vars());
    }

    public function addJob()
    {
        return view('backend.carrer.addJob');
    }

    public function storeJob(Request $request)
    {

        $job = new Carrer();
        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->description = $request->description;
        $job->expire_date = $request->expire_date;
        $job->save();

        return redirect()->route('carrer')->with('success', 'Addeded');
    }

    public function edit(Carrer $job)
    {
        return view('backend.carrer.editJob', get_defined_vars());
    }

    public function update(Request $request, Carrer $job)
    {
        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->description = $request->description;
        $job->expire_date = $request->expire_date;
        $job->save();

        return redirect()->route('carrer')->with('success', 'Updated successfully');
    }


    public function delete(Carrer $job)
    {
        $job->delete();
        return back()->with('delete-message', 'Delete Successfully.');
    }

    public function applyed()
    {
        $applyed = Apply::all();
        return view('backend.carrer.jobApplyed', get_defined_vars());
    }

    public function applyedDelete($id)
    {
        $item = Apply::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found');
        }

        $item->delete();

        return redirect()->route('job.applyed')->with('delete_success', 'deleted successfully');
    }
}
