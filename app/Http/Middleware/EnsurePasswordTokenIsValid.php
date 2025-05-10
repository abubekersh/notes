<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = explode('/', $request->uri()->path())[1];
        $hased_token = DB::select('select token from password_reset_tokens where email = ?', [$request->email]);
        if ($hased_token == []) {
            return redirect('/login');
        } elseif (!Hash::check($token, $hased_token[0]->token)) {
            return redirect('/login');
        }
        return $next($request);
    }
}
