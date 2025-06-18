<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'terms',
        'is_active',
        'company_id'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function company()
    {
        return $this->belongsTo(CompanySetting::class, 'company_id');
    }
} 