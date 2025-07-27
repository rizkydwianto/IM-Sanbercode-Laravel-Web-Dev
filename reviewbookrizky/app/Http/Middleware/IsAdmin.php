<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
  /**
  * Handle an incoming request.
  *
  * @param \Closure(\illuminate\Http\Request): (\Symfony\Component\HttpFondation\Respon)
  */
  public function handle(Request $request, Closure $next): Response
  {
    $user = Auth::user();
    if($user && $user->role === 'admin'){
      return $next($request);
    }     

    return redirect('/')->with('danger', 'Anda Tidak bisa mengakses halaman ini');
  }
}