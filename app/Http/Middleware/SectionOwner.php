<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User; 

use Closure;

class SectionOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (User::find(Auth::user()->id)->isAdmin()) {
           return $next($request); 
        }
        
        abort(403, 'No Access');
    }
}
