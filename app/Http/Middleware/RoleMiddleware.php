<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
   public function handle(Request $request, Closure $next, $role)
{
    $user = Auth::user(); 

    if (!$user) {
        return redirect('/login');
    }

    if ($user->role !== $role) {
        abort(403, 'No tienes permiso para acceder a esta página');
    }

    return $next($request);
}

}
