<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id', 'name', 'color', 'description', 'price_monthly', 'price_yearly', 'features', 'youtube_link', 'slug'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}