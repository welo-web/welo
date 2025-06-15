<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Service;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use App\Models\Subscribe;
use App\Models\Plan;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'servicesCount' => Service::count(),
            'blogCount' => Blog::count(),
            'usersCount' => User::count(),
            'latestUpdate' => DB::table('settings')->latest()->value('updated_at'),
            'subscribeCount' => Subscribe::count(),
            'subscribers' => Subscribe::all(),
        ]);
    }

    public function settings()
    {
        return view('admin.settings', [
            'header' => Setting::where('key', 'header')->value('value'),
            'vision' => Setting::where('key', 'vision')->value('value'),
            'footer' => Setting::where('key', 'footer')->value('value'),
        ]);
    }

    public function updateSettings(Request $request)
    {
        foreach (['header', 'vision', 'footer'] as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $request->input($key)]);
        }

        return redirect()->back()->with('success', 'تم حفظ الإعدادات بنجاح!');
    }

    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Service::create($request->only(['name', 'description']));
        return back()->with('success', 'تمت إضافة الخدمة بنجاح');
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->only(['name', 'description']));
        return back()->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function deleteService($id)
    {
        Service::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الخدمة بنجاح');
    }

    public function blog() {
        return view('admin.blog');
    }

    public function faq() {
        return view('admin.faq');
    }
    public function manageSubscribers()
    {
        $subscribers = \App\Models\Subscribe::all();
        return view('admin.subscribers', compact('subscribers'));
    }
    public function deleteSubscriber($id)
    {
        \App\Models\Subscribe::findOrFail($id)->delete();
        return redirect()->route('admin.subscribers')->with('success', 'تم حذف الطلب بنجاح');
    }
    public function updateImportance(Request $request, $id)
    {
        $subscriber = \App\Models\Subscribe::findOrFail($id);
        $subscriber->importance = $request->importance;
        $subscriber->save();
        return back();
    }

    public function updateStatus(Request $request, $id)
    {
        $subscriber = \App\Models\Subscribe::findOrFail($id);
        $subscriber->status = $request->status;
        $subscriber->save();
        return back();
    }

    public function sendPayLink(Request $request, $id)
    {
        $subscriber = \App\Models\Subscribe::findOrFail($id);
        $subscriber->pay_link = $request->pay_link;
        $subscriber->status = 'في الانتظار الدفع';
        $subscriber->save();
        // يمكنك هنا إرسال رسالة SMS أو بريد للعميل بالرابط إذا أردت
        return back()->with('success', 'تم إرسال رابط الدفع!');
    }

    public function notify($id)
    {
        $subscriber = \App\Models\Subscribe::findOrFail($id);
        // أضف هنا كود إرسال إشعار (واتساب، SMS، بريد...)
        return back()->with('success', 'تم إرسال الإشعار للعميل!');
    }

    public function plans()
    {
        $services = Service::with('plans')->get();
        return view('admin.plan', compact('services'));
    }

    public function storePlan(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'required|numeric|min:0',
        ]);

        Plan::create($request->all());

        return redirect()->route('admin.plans.index')
            ->with('success', 'تم إضافة الباقة بنجاح');
    }

    public function editPlan($id)
    {
        $plan = Plan::findOrFail($id);
        $services = Service::all();
        return view('admin.plan_edit', compact('plan', 'services'));
    }

    public function updatePlan(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'price_monthly' => 'nullable|numeric',
            'price_yearly' => 'nullable|numeric',
            'slug' => 'required|string|unique:plans,slug,' . $id,
            'youtube_link' => 'nullable|url',
            'features' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $plan->update($request->all());
        return redirect()->route('admin.plans')->with('success', 'تم تحديث الباقة بنجاح');
    }

    public function deletePlan($id)
    {
        Plan::findOrFail($id)->delete();
        return redirect()->route('admin.plans')->with('success', 'تم حذف الباقة بنجاح');
    }

    public function updatePlanLink(Request $request, Plan $plan)
    {
        try {
            $request->validate([
                'details_link' => 'required|url'
            ]);

            $plan->update([
                'details_link' => $request->details_link
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الرابط بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateServiceLink(Request $request, Service $service)
    {
        try {
            $request->validate([
                'details_link' => 'required|url'
            ]);

            $service->update([
                'details_link' => $request->details_link
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الرابط بنجاح'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ: ' . $e->getMessage()
            ], 500);
        }
    }
}