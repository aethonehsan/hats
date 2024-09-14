<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

class SiteAdmin extends Model
{
    use HasFactory;
    protected $table = 'siteadmins'; // Name of the database table
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];
    public function site()
{
    return $this->hasOne(Site::class,'siteadmin_id');
}
}
