<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        // عندما لا يكون المستخدم مسجلاً الدخول → أعد توجيهه إلى صفحة login
        return $request->expectsJson() ? null : route('login');
    }
}
