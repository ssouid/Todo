<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\Response;
use UserTypeEnum;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$prams): Response
    {
        if (in_array(auth()->user()->user_type , $prams)) {
            // dd($prams);
            return $next($request);
        } else {
            abort(HttpResponse::HTTP_UNAUTHORIZED);
        }
    }
}
