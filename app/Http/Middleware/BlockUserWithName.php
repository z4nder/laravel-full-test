<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockUserWithName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if($request->user()->name === "Jane Doe") abort(401);
      
      return $next($request);
    }
}
