<?php

namespace App\Helpers;

class FeatureIconHelper
{
    public static function getSvg($name)
    {
        $icons = [

            // 🌱 ورقة نبات (رمز الزراعة والنمو)
            'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><path d="M3 21s0-8 7-13 11-5 11-5-1 9-8 14-10 4-10 4z"/></svg>',

            // 🌾 حقل مزروع
            'field' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#2ecc71" viewBox="0 0 24 24" width="70" height="70"><path d="M3 17l4-2 4 2 4-2 4 2v2l-4-2-4 2-4-2-4 2v-2zm0-4l4-2 4 2 4-2 4 2v2l-4-2-4 2-4-2-4 2v-2zm0-4l4-2 4 2 4-2 4 2v2l-4-2-4 2-4-2-4 2V9z"/></svg>',

            // 🌻 زهرة (رمز الطبيعة)
            'flower' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#2ecc71" viewBox="0 0 24 24" width="70" height="70"><circle cx="12" cy="12" r="3"/><path d="M12 2a5 5 0 015 5c0 1.3-.5 2.6-1.5 3.5S13.3 12 12 12s-2.6-.5-3.5-1.5S7 8.3 7 7a5 5 0 015-5z"/></svg>',

            // 🚜 جرار زراعي
            'tractor' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#2ecc71" viewBox="0 0 24 24" width="70" height="70"><path d="M19 11h-1l-2-4h-2V5h4l3 6zM7 13h8a3 3 0 013 3v3H4v-3a3 3 0 013-3z"/><circle cx="7" cy="19" r="2"/><circle cx="17" cy="19" r="2"/></svg>',

            // 💧 ماء وري
            'water' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#2ecc71" viewBox="0 0 24 24" width="70" height="70"><path d="M12 2C8 7 5 10 5 14a7 7 0 0014 0c0-4-3-7-7-12z"/></svg>',

            // 🌞 شمس للطاقة الزراعية
            'sun' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>',

            // 🍎 فاكهة طبيعية
            'apple' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><path d="M17 9a5 5 0 00-5-5 5 5 0 00-5 5c0 6 5 11 5 11s5-5 5-11zM12 3c1.5-1 3 0 3 0s-1 1.5-3 1.5S10.5 2 12 3z"/></svg>',

            // 🌿 براعم
            'seedling' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><path d="M12 2c-2.8 0-5 2.2-5 5 0 1.7 1.3 3 3 3h1v13h2V10h1c1.7 0 3-1.3 3-3 0-2.8-2.2-5-5-5z"/></svg>',

            // 🪴 نبتة في أصيص
            'plant' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><path d="M5 20h14l-1 2H6l-1-2zm7-9c-4 0-7 3-7 7h14c0-4-3-7-7-7zm1-8h-2v5h2V3zM4 6h16v2H4z"/></svg>',

            // 🧑‍🌾 مزارع
            'farmer' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="70" height="70"><path d="M12 2a3 3 0 013 3v2H9V5a3 3 0 013-3zM4 12v10h16V12l-8-3-8 3zm8 5a2 2 0 110-4 2 2 0 010 4z"/></svg>',
        ];

        return $icons[$name] ?? $icons['leaf'];
    }
}
