<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\SiteAdmin;
use App\Models\User;
use Stancl\Tenancy\Facades\Tenancy;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::all();
        return view('sites.index', compact('sites'));
    }

    public function create()
    {
        $siteadmins = SiteAdmin::all();
        return view('sites.create', compact('siteadmins'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $site = new Site();
        $site->name = $request->input('name');
        $site->location = $request->input('location');
        $site->status = $request->input('status');

        // Find and associate the SiteAdmin
        $siteadmin = SiteAdmin::find($request->input('siteadmin'));
        $site->siteadmin()->associate($siteadmin);

        // Save the Site
        $site->save();

        // Create a domain associated with the site
        $site->domains()->create([
            'domain' => $request->input('name') . "." . config('app.domain'),
            'site_id' => $site->id,
        ]);

        return redirect()->route('sites.index')->with('success', 'Site created successfully!');
    }

    public function show(string $id)
    {
        // Implement if needed
    }

    public function edit(string $id)
    {
        $siteadmins = SiteAdmin::all();
        $site = Site::findOrFail($id);
        return view('sites.edit', compact('site', 'siteadmins'));
    }

















    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',

            'siteadmin' => 'required|',
        ]);

        $site = Site::findOrFail($id);
        if ($site->siteadmin) {
            $oldSiteAdminId = $site->siteadmin->id;
        }


        $site->name = $request->input('name');
        $site->location = $request->input('location');
        $site->status = $request->input('status');

        // Find and associate the new SiteAdmin
        $siteadmin = SiteAdmin::find($request->input('siteadmin'));
        $site->siteadmin()->associate($siteadmin);

        // Save the Site
        $site->save();


        $site->domains()->update([
            'domain' => $request->input('name') . "." . config('app.domain'),
            'site_id' => $site->id,
        ]);

        // Update credentials in Site User Table
        if (isset($oldSiteAdminId) && $oldSiteAdminId){

            if($oldSiteAdminId){
                $siteadmin = SiteAdmin::findOrFail($oldSiteAdminId);
                $useremail = $siteadmin->email;

                Tenancy::find($site->id)?->run(function () use ($site, $useremail): void {
                    $targetUser = User::where('email', $useremail)->first();


                    if ($targetUser) {
                        $targetUser->name = $site->siteadmin->name;
                        $targetUser->email = $site->siteadmin->email;
                        $targetUser->status = $site->siteadmin->status;
                        $targetUser->password =$site->siteadmin->password;
                        $targetUser->save();
                        $targetUser->assignRole('Admin');
                    }
                    else{
                    $user= new User();
                    $user->name = $site->siteadmin->name;
                    $user->email = $site->siteadmin->email;
                    $user->status = $site->siteadmin->status;
                    $user->password = $site->siteadmin->password;
                    $user->save();
                    $user->assignRole('Admin');
                    }
                });

            }


        }
        return redirect()->route('sites.index')->with('success', 'Site updated successfully!');

    }













    public function destroy(string $id)
    {
        Site::destroy($id);
        return redirect()->route('sites.index')->with('success', 'Site deleted successfully!');

    }
}
