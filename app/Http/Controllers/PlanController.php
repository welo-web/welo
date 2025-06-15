<?php
use App\Models\Plan;

class PlanController
{
    public function show($slug)
    {
        $plan = Plan::where('slug', $slug)->with('service')->firstOrFail();
        return view('plans.show', compact('plan'));
    }
}