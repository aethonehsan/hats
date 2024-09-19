<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Stancl\Tenancy\Database\Concerns\HasDomains;
use App\Models\SiteAdmin;

class Site extends BaseTenant implements TenantWithDatabase
{
    protected $table = 'sites'; // Name of the database table

    use HasDatabase, HasDomains, HasFactory;
    public static function getCustomColumns(): array
{
    return [
    'id',
    'name',
    'location',
    'status',
    'siteadmin_id'
    ];
}
protected $fillable = ['name', 'location', 'status', 'siteadmin_id']; // Ensure 'data' is NOT in this list



    public function domains()
{
    return $this->hasMany(Domain::class);
}

public function siteadmin()
{
    return $this->belongsTo(SiteAdmin::class ,'siteadmin_id');
}
}
