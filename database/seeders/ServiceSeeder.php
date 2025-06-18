<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'نظام المطاعم',
                'slug' => 'restaurant',
                'description' => 'نظام متكامل لإدارة المطاعم مع نظام نقاط البيع وإدارة المخزون',
                'basic_price' => 199,
                'advanced_price' => 399,
                'professional_price' => 599,
                'features' => json_encode([
                    'إدارة الطلبات والمبيعات',
                    'نظام نقاط البيع',
                    'إدارة المخزون',
                    'تقارير المبيعات',
                    'تطبيق للهواتف'
                ]),
                'is_active' => 1,
                'order' => 1
            ],
            [
                'name' => 'نظام الصالونات',
                'slug' => 'salon',
                'description' => 'نظام متخصص لإدارة صالونات التجميل مع حجز المواعيد وإدارة العملاء',
                'basic_price' => 199,
                'advanced_price' => 399,
                'professional_price' => 599,
                'features' => json_encode([
                    'حجز المواعيد',
                    'إدارة العملاء',
                    'إدارة الموظفين',
                    'نظام الولاء',
                    'تقارير الأداء'
                ]),
                'is_active' => 1,
                'order' => 2
            ],
            [
                'name' => 'نظام المدارس',
                'slug' => 'school',
                'description' => 'نظام متكامل لإدارة المدارس مع إدارة الطلاب والمعلمين والمناهج',
                'basic_price' => 299,
                'advanced_price' => 499,
                'professional_price' => 699,
                'features' => json_encode([
                    'إدارة الطلاب',
                    'جدول الحصص',
                    'متابعة الحضور',
                    'التواصل مع أولياء الأمور',
                    'التقارير المدرسية'
                ]),
                'is_active' => 1,
                'order' => 3
            ],
            [
                'name' => 'نظام العيادات',
                'slug' => 'clinic',
                'description' => 'نظام متكامل لإدارة العيادات مع حجز المواعيد وإدارة المرضى',
                'basic_price' => 299,
                'advanced_price' => 499,
                'professional_price' => 699,
                'features' => json_encode([
                    'حجز المواعيد',
                    'سجل المرضى',
                    'إدارة الأطباء',
                    'الفواتير الطبية',
                    'التقارير الطبية'
                ]),
                'is_active' => 1,
                'order' => 4
            ],
            [
                'name' => 'نظام المغاسل',
                'slug' => 'laundry',
                'description' => 'نظام متكامل لإدارة المغاسل مع تتبع الطلبات وإدارة المخزون',
                'basic_price' => 199,
                'advanced_price' => 399,
                'professional_price' => 599,
                'features' => json_encode([
                    'إدارة الطلبات',
                    'تتبع الملابس',
                    'إدارة الأسعار',
                    'نظام الولاء',
                    'تقارير المبيعات'
                ]),
                'is_active' => 1,
                'order' => 5
            ],
            [
                'name' => 'نظام المحلات',
                'slug' => 'retail',
                'description' => 'نظام متكامل لإدارة المحلات التجارية والبيع بالتجزئة',
                'basic_price' => 199,
                'advanced_price' => 399,
                'professional_price' => 599,
                'features' => json_encode([
                    'إدارة المخزون',
                    'نظام نقاط البيع',
                    'إدارة الموردين',
                    'نظام الولاء',
                    'تقارير المبيعات'
                ]),
                'is_active' => 1,
                'order' => 6
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}