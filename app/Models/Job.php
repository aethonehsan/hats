<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['name','category','destination','price','status'];

    public function runcategory()
{
    return $this->belongsTo(Department::class);
}
}


