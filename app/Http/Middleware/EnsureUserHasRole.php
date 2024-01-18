<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $role): Response|string
    {

        if ($role === 'author') {
            return back()->withErrors(['message' => '123']);
        }
        return $next($request);
    }

    public function terminate($request, $response)
    {

        dd(123);
    }

}
