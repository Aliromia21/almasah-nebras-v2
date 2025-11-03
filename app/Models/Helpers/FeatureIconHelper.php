<?php

namespace App\Helpers;

class FeatureIconHelper
{
    public static function getSvg($name)
    {
        $icons = [
            'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#28a745" viewBox="0 0 24 24" width="60" height="60"><path d="M4 13c0 4.418 3.582 8 8 8 4.418 0 8-3.582 8-8 0-7-8-12-8-12s-8 5-8 12z"/></svg>',
            'heart' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#e74c3c" viewBox="0 0 24 24" width="60" height="60"><path d="M12 21s-8.5-6.3-8.5-11.4S6.8 3 12 7.2 20.5 3 20.5 9.6 12 21 12 21z"/></svg>',
            'apple' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#27ae60" viewBox="0 0 24 24" width="60" height="60"><path d="M12 2c1.1 0 2 .9 2 2s-.9 2-2 2C7.6 6 4 9.6 4 14c0 3.3 2.7 6 6 6h4c3.3 0 6-2.7 6-6 0-4.4-3.6-8-8-8z"/></svg>',
            'star' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#f1c40f" viewBox="0 0 24 24" width="60" height="60"><path d="M12 .587l3.668 7.431L24 9.753l-6 5.847L19.336 24 12 20.019 4.664 24 6 15.6 0 9.753l8.332-1.735z"/></svg>',
            'sun' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#f39c12" viewBox="0 0 24 24" width="60" height="60"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>',
            'tree' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#2ecc71" viewBox="0 0 24 24" width="60" height="60"><path d="M12 2l4 6h-3v4h-2V8H8l4-6zm0 10a5 5 0 00-5 5v3h10v-3a5 5 0 00-5-5z"/></svg>',
            'carrot' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#e67e22" viewBox="0 0 24 24" width="60" height="60"><path d="M19 3l2 2-2 2-2-2 2-2zM14 6l2 2L4 20l-2-2L14 6z"/></svg>',
            'seedling' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#16a085" viewBox="0 0 24 24" width="60" height="60"><path d="M12 2c-2.8 0-5 2.2-5 5 0 1.7 1.3 3 3 3h1v13h2V10h1c1.7 0 3-1.3 3-3 0-2.8-2.2-5-5-5z"/></svg>',
            'flower' => '<svg xmlns="http://www.w3.org/2000/svg" fill="#9b59b6" viewBox="0 0 24 24" width="60" height="60"><circle cx="12" cy="12" r="3"/><path d="M12 2a5 5 0 015 5c0 1.3-.5 2.6-1.5 3.5S13.3 12 12 12s-2.6-.5-3.5-1.5S7 8.3 7 7a5 5 0 015-5z"/></svg>',
        ];

        return $icons[$name] ?? $icons['leaf'];
    }
}
