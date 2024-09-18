<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class TenantDashboardController extends Controller
{
    public function index()
    {
        $tenants=Site::all();
        return view('tenantsdashboard.index', compact('tenants'));
    }

}
