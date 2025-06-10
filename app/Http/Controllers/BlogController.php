<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function index()
    {
        $articles = [
            [
                'title' => '5 أدوات رقمية تساعدك في تطوير أعمالك',
                'description' => 'اكتشف أبرز الأدوات الرقمية لزيادة الإنتاجية.',
                'category' => 'نصائح تقنية',
                'image_url' => 'https://source.unsplash.com/600x400/?technology,1',
            ],
            [
                'title' => 'أفضل الممارسات لإدارة المشاريع الصغيرة',
                'description' => 'تعرف على خطوات تنظيم العمل في مشروعك.',
                'category' => 'إدارة المشاريع',
                'image_url' => 'https://source.unsplash.com/600x400/?project,2',
            ],
            [
                'title' => 'كيف تحسن سرعة موقعك الإلكتروني؟',
                'description' => 'طرق فعالة لتقليل وقت تحميل الصفحات.',
                'category' => 'تحسين الأداء',
                'image_url' => 'https://source.unsplash.com/600x400/?performance,3',
            ],
            [
                'title' => 'خطوة بخطوة لاستخدام نظام نقاط البيع',
                'description' => 'شرح شامل لطريقة استخدام النظام.',
                'category' => 'دليل المستخدم',
                'image_url' => 'https://source.unsplash.com/600x400/?pos,4',
            ],
            [
                'title' => 'استراتيجيات التسويق عبر واتساب',
                'description' => 'نصائح لتسويق خدماتك عبر واتساب.',
                'category' => 'تسويق رقمي',
                'image_url' => 'https://source.unsplash.com/600x400/?marketing,5',
            ],
            [
                'title' => 'أهمية النسخ الاحتياطي في الأعمال',
                'description' => 'لماذا يجب عليك عمل نسخة احتياطية يوميًا.',
                'category' => 'نصائح تقنية',
                'image_url' => 'https://source.unsplash.com/600x400/?backup,6',
            ],
            [
                'title' => 'كيف تختار نظام محاسبة مناسب؟',
                'description' => 'معايير اختيار أفضل برنامج محاسبي.',
                'category' => 'إدارة المشاريع',
                'image_url' => 'https://source.unsplash.com/600x400/?accounting,7',
            ],
            [
                'title' => 'دليلك لاستخدام تطبيق صالون التجميل',
                'description' => 'كيفية تشغيل وإدارة صالونك باستخدام نظامنا.',
                'category' => 'دليل المستخدم',
                'image_url' => 'https://source.unsplash.com/600x400/?salon,8',
            ],
            [
                'title' => 'تقارير الأداء: كيف تراقب نمو مشروعك؟',
                'description' => 'تحليل النتائج وتقارير النمو الشهري.',
                'category' => 'تحسين الأداء',
                'image_url' => 'https://source.unsplash.com/600x400/?growth,9',
            ],
            [
                'title' => 'أسرار تحسين تجربة المستخدم في المواقع',
                'description' => 'مبادئ تصميم تجربة مستخدم ممتازة.',
                'category' => 'تسويق رقمي',
                'image_url' => 'https://source.unsplash.com/600x400/?ux,10',
            ]
        ];

        return view('blog', compact('articles'));
    }
}
