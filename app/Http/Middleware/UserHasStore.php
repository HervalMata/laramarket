<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHasStore
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->store()->count()) {
            flash('Você já possui uma loja!')->warning();
            return view('admin.stores.create');
        }
        return $next($request);
    }
}
