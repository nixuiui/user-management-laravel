<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permission
{
    public function handle($request, Closure $next, $permissionKey)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (!hasPermissionByKey($user->role->permissions, $permissionKey)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}