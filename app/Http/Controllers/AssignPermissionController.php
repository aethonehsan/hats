<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionController extends Controller
{
    public function assignpermission(Request $request,  string $rid)
    {
        $permissionname=$request->permissionname;
        $role = Role::find($rid);
        $role->GivePermissionto($permissionname);

        return redirect('/roles');
    }

}

