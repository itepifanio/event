<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class HasStatus
{
    public function handle(Request $request, Closure $next, ...$status)
    {
        
        if(! $request->organization) {
            return redirect()->route('home');
        }
        
        $state = optional(
            auth()->user()->organizations()->where('organizations.id', $request->organization->id)->first()
        )->pivot->status;
        
        if($state && in_array($state, $status)){
            return $next($request);
        }

        return redirect()->route('home');
    }
}
