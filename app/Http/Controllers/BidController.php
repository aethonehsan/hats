<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\Permission;
class BidController extends Controller
{


    public function index()
    {
        $bids=Bid::all();
        $permissions=Permission::all();;
        return view('app.bids.index', compact('bids', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.bids.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Create user
        Bid::create([
            'name' => $request->input('name'),
        ]);
    
        // Redirect with success message
        return redirect()->route('bids.index')->with('success', 'User created successfully!');
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
        $bid=Bid::find($id);
        return view('app.bids.edit', compact('bid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $bid=Bid::find($id);
      $bid->name=$request->name;
      $bid->save();
      
      return redirect()->route('bids.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bid::destroy($id);
        return redirect()->route('bids.index');

    }
}
