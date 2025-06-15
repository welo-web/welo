<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'slug', 'description', 'demo_link', 'details_link'];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
