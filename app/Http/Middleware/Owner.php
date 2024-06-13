<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route('balance')) {
            if ($request->route('balance')->id != auth()->id()) {
                return redirect()->route('balance.show', auth()->id());
            }
        } else {
            if ($request->route('user')->id != auth()->id()) {
                return redirect()->route('balance.show', auth()->id());
            }
        }
        return $next($request);
    }
}
