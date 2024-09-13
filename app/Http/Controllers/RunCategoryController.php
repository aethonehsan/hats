<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Run;
use App\Models\RunCategory;
use App\Models\Permission;
class RunCategoryController extends Controller
{


    public function index()
    {
        $runcategories=RunCategory::all();

        return view('app.runcategories.index', compact('runcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $runcategories=RunCategory::all();

        return view('app.runcategories.create', compact('runcategories'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Create user
        
        
        

        RunCategory::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),

            'additional_details' => $request->input('additional_details'),
            'price' => $request->input('price'),
        ]);
    
        // Redirect with success message
        return redirect()->route('runcategories.index')->with('success', 'User created successfully!');
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
        $runcategory=RunCategory::find($id);
        return view('app.runcategories.edit', compact('runcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $runcategory=RunCategory::find($id);
      $runcategory->update(array_filter($request->only(['name', 'detail', 'additional_details', 'price']), function ($value) {
        return !is_null($value) && $value !== '';
    }));
    
      
      return redirect()->route('runcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RunCategory::destroy($id);
        return redirect()->route('runcategories.index');

    }
}
