<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Run;

class RunCategory extends Model
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
        return $this->hasMany(Run::class);  
    } 

    public function drivers()  
    {  
        return $this->hasMany(Run::class);  
    } 
}
