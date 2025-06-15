<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'صالون نسائي',
                'demo_link' => '/demo/salon',
                'details_link' => '/guide/salon'
            ],
            [
                'name' => 'بوتيك نسائي',
                'demo_link' => '/demo/boutique',
                'details_link' => '/guide/boutique'
            ],
            [
                'name' => 'مطعم',
                'demo_link' => '/demo/restaurant',
                'details_link' => '/guide/restaurant'
            ],
            [
                'name' => 'مغسلة ملابس',
                'demo_link' => '/demo/laundry',
                'details_link' => '/guide/laundry'
            ],
            [
                'name' => 'محل تجاري',
                'demo_link' => '/demo/retail',
                'details_link' => '/guide/retail'
            ],
            [
                'name' => 'مكتب جلب الأيدي العاملة',
                'demo_link' => '/demo/labor',
                'details_link' => '/guide/labor'
            ],
            [
                'name' => 'مدرسة',
                'demo_link' => '/demo/school',
                'details_link' => '/guide/school'
            ],
            [
                'name' => 'مستشفى / عيادة',
                'demo_link' => '/demo/clinic',
                'details_link' => '/guide/clinic'
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }
}