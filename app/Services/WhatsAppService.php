<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Subscription;

class WhatsAppService
{
    protected $apiUrl;
    protected $apiToken;
    protected $phoneNumberId;

    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.api_url');
        $this->apiToken = config('services.whatsapp.api_token');
        $this->phoneNumberId = config('services.whatsapp.phone_number_id');
    }

    public function sendPaymentLink(Subscription $subscription)
    {
        $template = "payment_link";
        $components = [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => $subscription->customer_name
                    ],
                    [
                        "type" => "text",
                        "text" => route('payment.link', $subscription->id)
                    ]
                ]
            ]
        ];

        return $this->sendTemplateMessage($subscription->phone, $template, $components);
    }

    public function sendPaymentReminder(Subscription $subscription)
    {
        $template = "payment_reminder";
        $components = [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => $subscription->customer_name
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->service->name
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->expires_at->format('Y-m-d')
                    ]
                ]
            ]
        ];

        return $this->sendTemplateMessage($subscription->phone, $template, $components);
    }

    public function sendSubscriptionConfirmation(Subscription $subscription)
    {
        $template = "subscription_confirmation";
        $components = [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => $subscription->customer_name
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->service->name
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->subscription_type_text
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->expires_at->format('Y-m-d')
                    ]
                ]
            ]
        ];

        return $this->sendTemplateMessage($subscription->phone, $template, $components);
    }

    public function sendInvoice(Subscription $subscription)
    {
        $template = "invoice";
        $components = [
            [
                "type" => "body",
                "parameters" => [
                    [
                        "type" => "text",
                        "text" => $subscription->customer_name
                    ],
                    [
                        "type" => "text",
                        "text" => number_format($subscription->price, 2)
                    ],
                    [
                        "type" => "text",
                        "text" => $subscription->service->name
                    ]
                ]
            ]
        ];

        return $this->sendTemplateMessage($subscription->phone, $template, $components);
    }

    protected function sendTemplateMessage($to, $template, $components)
    {
        $response = Http::withToken($this->apiToken)
            ->post("{$this->apiUrl}/{$this->phoneNumberId}/messages", [
                "messaging_product" => "whatsapp",
                "to" => $to,
                "type" => "template",
                "template" => [
                    "name" => $template,
                    "language" => [
                        "code" => "ar"
                    ],
                    "components" => $components
                ]
            ]);

        return $response->json();
    }
} 