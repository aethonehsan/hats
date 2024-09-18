<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\SiteAdmin;
use App\Models\User;
use App\Models\Site;
use Stancl\Tenancy\Facades\Tenancy;

class SiteAdminController extends Controller
{
    /**
     * Display a listing of the site admins.
     */
    public function index()
    {
        $users = SiteAdmin::all();
        return view('siteadmins.index', compact('users'));
    }

    /**
     * Show the form for creating a new site admin.
     */
    public function create()
    {
        return view('siteadmins.create');
    }

    /**
     * Store a newly created site admin in storage.
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',

        ]);

        // Create site admin
        SiteAdmin::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),

        ]);


        // Redirect with success message
        return redirect()->route('siteadmins.index')->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified site admin.
     */
    public function edit(string $id)
    {
        $user = SiteAdmin::findOrFail($id);
        return view('siteadmins.edit', compact('user'));
    }

    /**
     * Update the specified site admin in storage.
     */
    public function update(Request $request, string $id)
    {
        $siteadmin = SiteAdmin::findOrFail($id);

        // Store old email to update related user
        $oldEmail = $siteadmin->email;

        // Update site admin details
        $siteadmin->name = $request->input('name');
        $siteadmin->email = $request->input('email');
        $siteadmin->password = Hash::make($request->input('password'));
        $siteadmin->status = $request->input('status');
        $siteadmin->save();

        // Update related user if site exists
        if ($siteadmin->site) {
            $site = $siteadmin->site;
            Tenancy::find($site->id)?->run(function () use ($site, $oldEmail): void {
                $targetUser = User::where('email', $oldEmail)->first();
                if ($targetUser) {
                    $targetUser->name = $site->siteadmin->name;
                    $targetUser->email = $site->siteadmin->email;
                    $targetUser->status = $site->siteadmin->status;
                    $targetUser->password = $site->siteadmin->password;
                    $targetUser->save();
                }
            });
        }

        // Redirect with success message
        return redirect()->route('siteadmins.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified site admin from storage.
     */
    public function destroy(string $id)
    {

        $siteadmin= SiteAdmin::Find($id);
        $site=$siteadmin->site;
        if($site){
        Tenancy::find($site->id)?->run(function () use ($siteadmin): void {
            $targetUser = User::where('email', $siteadmin->email)->first();
            if ($targetUser) {

                User::destroy($targetUser->id);

            }
        });
    }
        SiteAdmin::destroy($id);
        return redirect()->route('siteadmins.index')->with('success', 'User deleted successfully!');
    }
}
