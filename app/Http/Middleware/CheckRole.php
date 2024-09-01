<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request):   
 (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next

   * @param  string  $role
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if (!auth()->check() || auth()->user()->role === 0) {
      return
        redirect()->back();
    }
    return $next($request);
  }
}
