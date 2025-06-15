<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function userGuide()
    {
        $projects = [
            [
                'name' => 'مغسلة ملابس',
                'icon' => 'fa-shirt',
                'color' => 'text-primary',
                'demo' => 'https://demo.example.com/laundry',
                'guide' => '/guide/laundry'
            ],
            // ... باقي المشاريع ...
        ];
        return view('user_guide', compact('projects'));
    }

    public function subscribeForm()
    {
        $projects = [
            // ... نفس المصفوفة ...
        ];
        return view('subscribe_form_dynamic_v2', compact('projects'));
    }
}
