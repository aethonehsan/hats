<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{


    public function index()
    {
        $roles=Role::all();
        $permissions=Permission::all();;
        return view('app.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.roles.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Create user
        Role::create([
            'name' => $request->input('name'),
        ]);
    
        // Redirect with success message
        return redirect()->route('roles.index')->with('success', 'User created successfully!');
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
        $role=Role::find($id);
        return view('app.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $role=Role::find($id);
      $role->name=$request->name;
      $role->save();
      
      return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->route('roles.index');

    }
}
