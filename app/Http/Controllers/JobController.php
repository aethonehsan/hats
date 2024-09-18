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
        $runs=Job::all();
        $runcategories= Department::all();

        return view('app.runs.index', compact('runs', 'runcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $runcategories=Department::all();

        return view('app.runs.create', compact('runcategories'));
    }

    public function store(Request $request)
    {
        // Find the target category by name
        $targetCategory = Department::where('name', $request->input('category'))->first();

        if ($targetCategory) {
            // Create a new Run
            $run = new Job();
            $run->name = $request->input('name');
            $run->destination = $request->input('destination');
            $run->price = $request->input('price');
            $run->status = $request->input('status');

            // Set the category_id for the run
            $run->runcategory()->associate($targetCategory);

            // Save the Run
            $run->save();

            // Optionally, you could return a response or redirect to another page
            return redirect()->route('runs.index')->with('success', 'Run created successfully.');
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
        $run=Job::find($id);
        $runcategories=Department::all();
        return view('app.runs.edit', compact('run' , 'runcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $targetCategory = Department::where('name', $request->input('category'))->first();

        $run=Job::find($id);
        if ($targetCategory) {
            // Create a new Run
            $run->name = $request->input('name');
            $run->destination = $request->input('destination');
            $run->price = $request->input('price');
            $run->status = $request->input('status');

            // Set the category_id for the run
            $run->runcategory()->associate($targetCategory);

            // Save the Run
            $run->save();

            // Optionally, you could return a response or redirect to another page
            return redirect()->route('runs.index')->with('success', 'Run created successfully.');
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
        return redirect()->route('runs.index');

    }
}
