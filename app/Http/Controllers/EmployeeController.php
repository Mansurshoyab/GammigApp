<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('backend.employee.employee', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.employee.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $employee = new Employee();

        // Handle image upload
        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $employee->image = $fileName;
        }

        // Handle name
        $employee->name = $request->input('name');

        // Handle content (designation and company_name)
        $content = [];
        $designations = (array) $request->input('designation'); // Ensure it's treated as array
        $companyNames = (array) $request->input('company_name'); // Ensure it's treated as array
        foreach ($designations as $key => $designation) {
            $content[] = [
                'designation' => $designation,
                'company_name' => $companyNames[$key] ?? null,
            ];
        }
        $employee->content = json_encode($content);

        // Save the employee
        $employee->save();

        // Redirect back or wherever you need to go after saving
        return redirect()->back()->with('success', 'Employee created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('backend.employee.showEmployee', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Employee $employee , $id)
    // {
    //     return view('backend.employee.editEmployee', get_defined_vars());
    // }

    // public function edit(Employee $employee)
    // {
    //     return view('backend.employee.editEmployee', get_defined_vars());
    // }

    public function edit(Employee $employee)
    {
        $designationData = json_decode($employee->content);
        return view('backend.employee.editEmployee', compact('employee', 'designationData'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'designation.*' => 'required|string|max:255',
            'company_name.*' => 'required|string|max:255',
        ]);

        // Update basic employee information
        $employee->name = $validatedData['name'];
        if ($request->hasFile('image')) {
            $fileName = time() . "-" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('_uploads'), $fileName);
            $employee->image = $fileName;
        }

        // Decode the JSON content
        $designationData = [];
        if ($employee->content) {
            $designationData = json_decode($employee->content);
        }

        // Update JSON content with submitted form data
        $designationData = [];
        foreach ($validatedData['designation'] as $key => $designation) {
            $designationData[] = [
                'designation' => $designation,
                'company_name' => $validatedData['company_name'][$key]
            ];
        }

        // Encode the updated JSON content
        $employee->content = json_encode($designationData);

        // Save the updated employee data
        $employee->save();

        // Redirect back with success message or handle response as needed
        return redirect()->route('employee')->with('success, Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('delete_success', 'Delete Successfully.');
    }
}
