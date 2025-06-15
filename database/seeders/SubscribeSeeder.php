<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscribe;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subscribe::create([
            'name' => 'وليد محمد',
            'buisness' => 'شركة التقنية',
            'phone' => '968987654321',
            'service' => 'تطوير مواقع',
            'importance' => 'ليس مهم',
            'status' => 'في الانتظار الدفع',
            'pay_link' => null,
        ]);

        Subscribe::create([
            'name' => 'أحمد خالد',
            'buisness' => 'تسويق رقمي',
            'phone' => '968987650000',
            'service' => 'إدارة الحملات الإعلانية',
            'importance' => 'ليس مهم',
            'status' => 'في الانتظار الدفع',
            'pay_link' => null,
        ]);
    }
}
