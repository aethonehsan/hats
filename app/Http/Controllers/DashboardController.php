<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Site\User;
use App\Models\Site;
use App\Models\SuperAdmin;
class DashboardController extends Controller
{
    public function  index(){
        // $totaltenants=Site::count();
        // $totalsuperadmins=SuperAdmin::count();
        return view('app.dashboard');
    }
    public function  driver(){
        return view('app.driver.dashboard');
    }
    // public function  assignrole(Request $request, string $id){
    //     $user=User::find($id);
    //     $user->assignRole($request->rollname);
    //     $user->save();
    // }
}
