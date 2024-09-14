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
        $siteadmins=SiteAdmin::all();
        $site=Site::find($id);
        return view('sites.edit', compact('site','siteadmins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $site = Site::Find($id);
        $oldemail=$site->siteadmin->email;
        $site->name = $request->input('name');
        $site->location = $request->input('location');
        $site->status = $request->input('status');

        // Find the corresponding SiteAdmin
        $siteadmin = SiteAdmin::find($request->input('siteadmin'));

        // Associate the SiteAdmin with the Site

        $site->siteadmin()->associate($siteadmin);



        // Save the Site
        $site->save();

       $site->domains()->update([
            'domain' => $request->input('name').".".config('app.domain'),
            'site_id'=>$site->id,
        ]);

//to update credential in Site User Table

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
return redirect()->route('sites.index');




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
