<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RunCategory;


use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $drivers=Driver::all();
        return view ('app.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $runcategories=RunCategory::all();
        return view('app.drivers.create', compact('runcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        Driver::Create(
            [

                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password' => Hash::make($request->input('password')),
                    'phone_no'=> $request->phone_no,
                    'lisence_no'=> $request->lisence_no,
                    'vehicle_type'=> $request->vehicle_type,
                    'run_category'=>$request->run_category,
            ]
            );
            $user=User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            $user->assignRole('Driver');
        return redirect()->route('drivers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $driver=Driver::find($id);
        $runcategories=RunCategory::all();
        $drivers=Driver::all();
        return view ('app.drivers.edit', compact('drivers', 'runcategories', 'driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the driver by ID
        $driver = Driver::find($id);

        $driveremail = $driver->email;
    
        // Update driver details

        $driver->update(array_filter($request->only([
            'name' =>$request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'lisence_no' => $request->lisence_no,
            'vehicle_type' => $request->vehicle_type,
            'run_category' > $request->run_category,
      ]), function ($value) {
          return !is_null($value) && $value !== '';
      }));

    
        // Update the user details
        if ($request->filled('email')) {
            // Find the user associated with the driver
            $user = User::where('email', $driver->email)->first();
            if ($user) {
                // Update user details
                $user->name = $request->input('name', $user->name);
                $user->email = $request->input('email', $user->email);
                
                // Update password if provided
                if ($request->filled('password')) {
                    $user->password = Hash::make($request->input('password'));
                }
    
                $user->save();
            } else {
                return redirect()->back()->with('error', 'User not found.');
            }
        }
    
        return redirect()->route('drivers.index')->with('success', 'Driver and user updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $driver=Driver::find($id);
       
        $driveremail=$driver->email;
        $user=User::where('email', $driveremail)->first();
        $user->delete();
        Driver::destroy($id);
        return redirect()->route('drivers.index');
    }
}
