<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'basic_price' => 'required|numeric|min:0',
            'advanced_price' => 'required|numeric|min:0',
            'professional_price' => 'required|numeric|min:0',
            'features' => 'array',
            'basic_features' => 'array',
            'advanced_features' => 'array',
            'professional_features' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'تم إضافة الخدمة بنجاح');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'basic_price' => 'required|numeric|min:0',
            'advanced_price' => 'required|numeric|min:0',
            'professional_price' => 'required|numeric|min:0',
            'features' => 'array',
            'basic_features' => 'array',
            'advanced_features' => 'array',
            'professional_features' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer|min:0'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'تم تحديث الخدمة بنجاح');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'تم حذف الخدمة بنجاح');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['is_active' => !$service->is_active]);

        return redirect()->route('admin.services.index')
            ->with('success', 'تم تحديث حالة الخدمة بنجاح');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:services,id',
            'items.*.order' => 'required|integer|min:0'
        ]);

        foreach ($request->items as $item) {
            Service::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
} 