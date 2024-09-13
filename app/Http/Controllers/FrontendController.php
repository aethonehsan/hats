<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\User;
class FrontendController extends Controller
{
    public function  showwelcome(){
        $tenants=Site::all();
        return view('welcome', compact('tenants'));
    }

}
