<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $table = 'subscribe';
    protected $fillable = [
        'name', 'phone', 'project', 'plan', 'billing', 'price',
        'importance', 'status', 'pay_link'
    ];
}
