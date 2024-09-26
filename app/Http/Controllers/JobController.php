<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Department;

class JobController extends Controller
{


    public function index()
    {
        $jobs=Job::all();
        $departments= Department::all();

        return view('app.jobs.index', compact('jobs', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::all();

        return view('app.jobs.create', compact('departments'));
    }

    public function store(Request $request)
    {
        // Find the target category by name
        $targetCategory = Department::where('name', $request->input('category'))->first();

        if ($targetCategory) {
            // Create a new Job
            $job = new Job();
            $job->name = $request->input('name');
            $job->destination = $request->input('destination');
            $job->price = $request->input('price');
            $job->status = $request->input('status');

            // Set the category_id for the Job
            $job->department()->associate($targetCategory);

            // Save the Job
            $job->save();

            // Optionally, you could return a response or redirect to another page
            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
        } else {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'Category not found.');
        }
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
        $job=Job::find($id);
        $departments=Department::all();
        return view('app.jobs.edit', compact('job' , 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $targetCategory = Department::where('name', $request->input('category'))->first();

        $job=Job::find($id);
        if ($targetCategory) {
            // Create a new Job
            $job->name = $request->input('name');
            $job->destination = $request->input('destination');
            $job->price = $request->input('price');
            $job->status = $request->input('status');

            // Set the category_id for the Job
            $job->departments()->associate($targetCategory);

            // Save the Job
            $job->save();

            // Optionally, you could return a response or redirect to another page
            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
        } else {
            // Handle the case where the category is not found
            return redirect()->back()->with('error', 'Category not found.');
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Job::destroy($id);
        return redirect()->route('jobs.index');

    }
}
