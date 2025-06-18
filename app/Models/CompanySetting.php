<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'company_name', 'phone', 'website', 'address', 'tax_number', 'commercial_registration', 'logo', 'letterhead'
    ];
} 