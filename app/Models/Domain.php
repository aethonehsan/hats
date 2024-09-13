<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = ['domain', 'site_id'];
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
