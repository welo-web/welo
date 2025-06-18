<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContractTemplate;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class ContractTemplateController extends Controller
{
    public function index()
    {
        $templates = ContractTemplate::with('company')->latest()->get();
        return view('admin.contracts.index', compact('templates'));
    }

    public function create()
    {
        $companies = CompanySetting::all();
        return view('admin.contracts.create_template', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'terms' => 'nullable|string',
            'company_id' => 'nullable|exists:company_settings,id',
            'is_active' => 'boolean'
        ]);

        ContractTemplate::create($validated);

        return redirect()->route('admin.contract-templates.index')
            ->with('success', 'تم إنشاء قالب العقد بنجاح');
    }

    public function edit(ContractTemplate $template)
    {
        $companies = CompanySetting::all();
        return view('admin.contracts.edit', compact('template', 'companies'));
    }

    public function update(Request $request, ContractTemplate $template)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'terms' => 'nullable|string',
            'company_id' => 'nullable|exists:company_settings,id',
            'is_active' => 'boolean'
        ]);

        $template->update($validated);

        return redirect()->route('admin.contract-templates.index')
            ->with('success', 'تم تحديث قالب العقد بنجاح');
    }

    public function destroy(ContractTemplate $template)
    {
        $template->delete();

        return redirect()->route('admin.contract-templates.index')
            ->with('success', 'تم حذف قالب العقد بنجاح');
    }

    public function toggleStatus(ContractTemplate $template)
    {
        $template->update(['is_active' => !$template->is_active]);
        return redirect()->route('admin.contract-templates.index')
            ->with('success', 'تم تحديث حالة القالب بنجاح');
    }
} 