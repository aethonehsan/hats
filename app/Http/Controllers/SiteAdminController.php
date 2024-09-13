<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\SiteAdmin;

class SiteAdminController extends Controller
{


    public function index()
    {

        $users=SiteAdmin::all();
        return view('siteadmins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siteadmins.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'status'=> 'required',
        ]);

        // Create user
        SiteAdmin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);

        // Redirect with success message
        return redirect()->route('siteadmins.index')->with('success', 'User created successfully!');
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
        $user=SiteAdmin::find($id);
        return view('siteadmins.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      $user=SiteAdmin::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->status=$request->status;
      $user->save();

      return redirect()->route('superadmins.index')->with('success', 'User Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = SiteAdmin::destroy($id);

        return redirect()->route('superadmins.index')->with('success', 'User forcefully deleted successfully');
    }




}
