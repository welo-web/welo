<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::withCount('subscriptions')->with('subscriptions')->get();
        return view('admin.clients.index', compact('clients'));
    }
    public function show($id)
    {
        $client = Client::with('subscriptions')->findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }
} 