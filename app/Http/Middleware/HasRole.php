<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class HasRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(! $request->organization) {
            return redirect()->route('home');
        }

        $role = optional(
            auth()->user()->organizations()->where('organizations.id', $request->organization->id)->first()
        )->pivot->role;

        if($role && in_array($role, $roles)){
            return $next($request);
        }

        return redirect()->route('home');
    }
}
