<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Fungsi ini buat kelola request user klo ada rolenya
    // klo user ada kesamaan role nya maka dibolehkan utk melakukan request selanjutnya
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // kasih logika klo user itu ada role yang sesuai
        if ( in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        // kondisi apabila user tdk boleh melewati jalur tertentu
        return abort(403);
    }
}