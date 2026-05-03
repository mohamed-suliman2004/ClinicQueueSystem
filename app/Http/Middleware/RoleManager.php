<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // لو مش مسجل دخول
        if (!Auth::check()) {
            return redirect('/login');
        }

        // دور المستخدم الحالي
        $authuser = Auth::user()->role;

        // لو الدور صحيح خليه يكمل
        if ($authuser == $role) {
            return $next($request);
        }

        // لو دخل صفحة غلط، رجعه لصفحته الصحيحة
        if ($authuser == 'admin') {
            return redirect()->route('admin.index');
        }

        if ($authuser == 'reception') {
            return redirect()->route('reception.index');
        }

        if ($authuser == 'patient') {
            return redirect()->route('patient.index');
        }

        // fallback
        Auth::logout();
        return redirect('/login');
    }
}
