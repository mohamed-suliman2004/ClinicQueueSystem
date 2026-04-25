<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
              if ($request->routeIs('logout')) {
        return $next($request);
    }

    if (!Auth::check()) {
        return redirect('/login');
    }

    $authuser = Auth::user()->role;

    if (
        ($role === 'admin' && $authuser === 'admin') ||
        ($role === 'reception' && $authuser === 'reception') ||
        ($role === 'patient' && $authuser === 'patient')
    ) {
        return $next($request);
    }

    switch ($authuser) {
          case 'admin':
            return redirect()->route('admin.index');
            break;
        case 'reception':
            return redirect()->route('reception.index');
            break;
        case 'patient':
            return redirect()->route('patient.index');
            break;
            default:
                return redirect('/login');
    }
    }
}
