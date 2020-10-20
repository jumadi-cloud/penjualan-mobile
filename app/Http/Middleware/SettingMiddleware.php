<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use App\Merek;

class SettingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data_merek = Merek::where('deleted_at',null)->get();
        $request->attributes->set('data_merek', $data_merek);
        return $next($request); 
    }
}
