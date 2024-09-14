<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\SiteAdmin;
use App\Models\User;
use Stancl\Tenancy\Facades\Tenancy;

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

      $siteadmin=SiteAdmin::find($id);

      //find old email to use in site user table
      $oldemail=$siteadmin->email;

      $siteadmin->name=$request->name;
      $siteadmin->email=$request->email;
      $siteadmin->password=Hash::make($request->password);
      $siteadmin->status=$request->status;
      $siteadmin->save();

      //update in site
      $site=$siteadmin->site;
        dd($site);
      Tenancy::find($site->id)?->run(function () use ($site, $oldemail): void {

        // Find the user by email
        $user = User::where('email', $oldemail)->first();

        // Check if the user exists before updating
        if ($user) {
            $user->name = $site->siteadmin->name;
            $user->email = $site->siteadmin->email;
            $user->password = $site->siteadmin->password;

            // Save the updated user
            $user->save();
        }

    });




    // Debugging: Check the tenantoldemail value

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
