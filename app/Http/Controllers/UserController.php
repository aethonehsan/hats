<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{


    public function index()
    {

        $users=User::Role('Admin')->get();
        $roles=Role::all();
        return view('app.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.users.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        
        // Create user
        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        $user->assignRole('Admin');
        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User created successfully!');


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
        $user=User::find($id);
        return view('app.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $user=User::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->save();

      return redirect()->route('users.index')->with('success', 'User Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
