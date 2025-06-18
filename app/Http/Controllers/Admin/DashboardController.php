<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::where('is_active', true)->count(),
            'total_subscriptions' => Subscription::count(),
            'pending_subscriptions' => Subscription::where('status', 'pending')->count(),
            'active_subscriptions' => Subscription::where('status', 'active')->count(),
            'cancelled_subscriptions' => Subscription::where('status', 'cancelled')->count(),
            'contracts_count' => \App\Models\Contract::count(),
            'templates_count' => \App\Models\ContractTemplate::count(),
        ];

        $recent_subscriptions = Subscription::with('service')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_subscriptions'));
    }
} 