<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = $request->user()->role->name;
        // проверка роли юзера
        if ($userRole != 'Admin' and $userRole != $role) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }

        return $next($request);
    }
}
