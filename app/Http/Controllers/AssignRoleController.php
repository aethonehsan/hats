<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignRoleController extends Controller
{
    public function assignrole(Request $request,  string $uid)
    {
        $rolename=$request->rolename;
        $user = User::find($uid);
        $user->AssignRole($rolename);

        return redirect('/users');

    }

}

