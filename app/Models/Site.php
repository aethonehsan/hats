<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use App\Models\SiteAdmin;

class Site extends BaseTenant implements TenantWithDatabase
{
    protected $table = 'sites'; // Name of the database table

    use HasDatabase, HasDomains;
    public static function getCustomColumns(): array
{
    return [
        'id',
        'name',
        'domain_name',
        'email',
        'password',
        'status',
    ];
}

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);

    }
    public function domains()
{
    return $this->hasMany(Domain::class);
}

public function siteadmin()
{
    return $this->belongsTo(SiteAdmin::class );
}
}
