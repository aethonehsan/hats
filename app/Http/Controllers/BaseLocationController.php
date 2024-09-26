<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BaseLocation;

class BaseLocationController extends Controller
{

    public function index()
    {
        $baselocations = BaseLocation::all();
        return view('app.baselocations.index', compact('baselocations'));
    }

    /**
     * Show the form for creating a new site admin.
     */
    public function create()
    {
        return view('app.baselocations.create');
    }

    /**
     * Store a newly created site admin in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|email',
        ]);

        // Create site admin
        BaseLocation::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);


        // Redirect with success message
        return redirect()->route('app.baselocations.index')->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified site admin.
     */
    public function edit(string $id)
    {
        $baselocation = BaseLocation::findOrFail($id);
        return view('app.baselocations.edit', compact('baselocation'));
    }

    /**
     * Update the specified site admin in storage.
     */
    public function update(Request $request, string $id)
    {
        $baselocation = BaseLocation::findOrFail($id);

        // Store old email to update related user
        $oldEmail = $baselocation->email;

        // Update site admin details
        $baselocation->name = $request->input('name');
        $baselocation->address = $request->input('address');
        $baselocation->save();

        // Redirect with success message
        return redirect()->route('app.baselocations.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified site admin from storage.
     */
    public function destroy(string $id)
    {

        $baselocation= BaseLocation::Find($id);
        BaseLocation::destroy($id);
        return redirect()->route('app.baselocations.index')->with('success', 'Base Location deleted successfully!');

    }
}
