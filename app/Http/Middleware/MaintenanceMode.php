<?php

namespace App\Http\Middleware;

use Closure;
use App\Setting;
class MaintenanceMode
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
        $maintenance = Setting::find('maintenance_mode'); //$setting = Setting::find('maintenance_mode')

        if ($maintenance->value === '0') //if id maintenance_mode in the Settings table == 0
        {
            return $next($request);
        }
        else
        {
            return redirect('/maintenance');
        }
    }
}
