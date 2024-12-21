<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($user && $user->banned) {
            if (Carbon::now('Asia/Jakarta')->lessThan($user->banned->BannedUntil)) {
                return redirect()->route('banned');
            } else {
                $user->banned->delete();
            }
        }

        return $next($request);
    }
}
