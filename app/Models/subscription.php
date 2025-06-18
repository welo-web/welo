<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'plan_type',
        'subscription_type',
        'price',
        'customer_name',
        'address',
        'phone',
        'status',
        'whatsapp_sent'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'whatsapp_sent' => 'boolean'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    public function getPlanTypeTextAttribute()
    {
        return match($this->plan_type) {
            'basic' => 'الباقة الأساسية',
            'advanced' => 'الباقة المتقدمة',
            'professional' => 'الباقة الاحترافية',
            default => $this->plan_type
        };
    }

    public function getSubscriptionTypeTextAttribute()
    {
        return $this->subscription_type === 'monthly' ? 'شهري' : 'سنوي';
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'pending' => 'قيد الانتظار',
            'active' => 'نشط',
            'cancelled' => 'ملغي',
            default => $this->status
        };
    }
}
