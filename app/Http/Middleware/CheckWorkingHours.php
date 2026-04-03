<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWorkingHours
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $heure = now()->hour;
        if ($heure < 8 || $heure >= 18) {
            return response("Accès autorisé uniquement entre 08h et 18h", 403);
        }
        return $next($request);
    }
}
