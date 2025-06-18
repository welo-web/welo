<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'features',
        'basic_price',
        'advanced_price',
        'professional_price',
        'basic_features',
        'advanced_features',
        'professional_features',
        'is_active',
        'order'
    ];

    protected $casts = [
        'features' => 'array',
        'basic_features' => 'array',
        'advanced_features' => 'array',
        'professional_features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
