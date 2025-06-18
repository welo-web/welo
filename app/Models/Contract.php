<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'subscription_id', 'client_id', 'template_id', 'type', 'price', 'discount', 'final_price', 'terms', 'status', 'pdf_path', 'tracking_token',
        'payment_method', 'payment_note', 'payment_attachment'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function template()
    {
        return $this->belongsTo(ContractTemplate::class, 'template_id');
    }
} 