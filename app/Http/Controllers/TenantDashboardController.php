<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantDashboardController extends Controller
{
    public function index()
    {
        $tenants=Tenant::all();
        return view('tenantsdashboard.index', compact('tenants'));
    }

}
