<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;
use App\Models\Permission;
class DepartmentController extends Controller
{


    public function index()
    {
        $departments=Department::all();

        return view('app.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::all();

        return view('app.departments.create', compact('departments'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create user




        Department::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),

            'additional_details' => $request->input('additional_details'),
            'price' => $request->input('price'),
        ]);

        // Redirect with success message
        return redirect()->route('departments.index')->with('success', 'User created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $department=Department::find($id);
        return view('app.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $department=Department::find($id);
      $department->update(array_filter($request->only(['name', 'detail', 'additional_details', 'price']), function ($value) {
        return !is_null($value) && $value !== '';
    }));


      return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Department::destroy($id);
        return redirect()->route('departments.index');

    }
}
