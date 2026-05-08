<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsActive
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && ($request->user()->is_active ?? true) === false) {
            return redirect('/')->with('error', 'Votre compte est desactive.');
        }

        return $next($request);
    }
}
