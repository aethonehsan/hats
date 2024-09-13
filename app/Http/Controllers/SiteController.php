<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Site;
use Stancl\Tenancy\Facades\Tenancy;
use App\Models\SiteAdmin;
use App\Models\User;



class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites=Site::all();
        return view('sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siteadmins=SiteAdmin::all();
        return view('sites.create', compact('siteadmins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $site = new Site();
        $site->name = $request->input('name');
        $site->location = $request->input('location');
        $site->status = $request->input('status');

        // Find the corresponding SiteAdmin
        $siteadmin = SiteAdmin::find($request->input('siteadmin'));

        // Associate the SiteAdmin with the Site

             $site->siteadmin()->associate($siteadmin);



        // Save the Site
        $site->save();





        $site->domains()->create([
            'domain' => $request->input('name').".".config('app.domain'),
            'site_id'=>$site->id,
        ]);
        return redirect(route('sites.index'))->with('success', 'Site created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $site=Site::find($id);
        return view('sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $site = Site::find($id);
        if (!$site) {
            return redirect()->route('tenants.index')->with('error', 'Tenant not found.');
        }

        $tenantoldemail = $site->email;

        // Only update the name if it's provided and not blank
        if ($request->filled('name')) {
            $site->name = $request->input('name');
        }
        if ($request->filled('status')) {
            $site->status = $request->input('status');
        }

        // Only update the domain_name if it's provided and not blank
        if ($request->filled('domain_name')) {
            $site->domain_name = $request->input('domain_name');
            // Also update the domain in the related domains table
            $site->domains()->update([
                'domain' => $site->domain_name . "." . config('app.domain')
            ]);
        }

        // Only update the email if it's provided and not blank
        if ($request->filled('email')) {
            $site->email = $request->input('email');
        }

        // Only update the password if it's provided and not blank
        if ($request->filled('password')) {
            $site->password = bcrypt($request->input('password'));
        }

        // Save the tenant with the updated fields
        $site->save();

        // Debugging: Check the tenantoldemail value


        Tenancy::find($site->id)?->run(function () use ($request, $tenantoldemail) {
            // Debugging: Check if tenant context is correctly set


            $user = User::where('email', $tenantoldemail)->first();
            if ($user) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->input('password')),
                ]);
            }
        });

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        Site::destroy($id);


        return redirect()->route('sites.index');

    }
}
