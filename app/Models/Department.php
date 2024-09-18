<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'additional-details',
        'price',
    ];

    public function runs()
    {
        return $this->hasMany(Job::class);
    }

    public function drivers()
    {
        return $this->hasMany(Job::class);
    }
}
