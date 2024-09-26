<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\SiteAdmin;

class TenantDashboardController extends Controller
{
    public function index()
    {
        $siteadmins = SiteAdmin::all();
        $sites = Site::all();

        // Correct usage of view() and compact()
        return view('dashboard', compact('sites', 'siteadmins'));
    }
}

