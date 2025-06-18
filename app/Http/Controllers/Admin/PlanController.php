<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::with('service')->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        $services = Service::where('is_active', true)->get();
        return view('admin.plans.create', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'features' => 'array',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['features'] = array_filter($request->features ?? []);

        Plan::create($validated);

        return redirect()->route('admin.plans.index')
            ->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function edit(Plan $plan)
    {
        $services = Service::where('is_active', true)->get();
        return view('admin.plans.edit', compact('plan', 'services'));
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'features' => 'array',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['features'] = array_filter($request->features ?? []);

        $plan->update($validated);

        return redirect()->route('admin.plans.index')
            ->with('success', 'تم تحديث الباقة بنجاح');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.plans.index')
            ->with('success', 'تم حذف الباقة بنجاح');
    }
} 