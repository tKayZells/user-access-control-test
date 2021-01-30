<?php

namespace App\Http\Middleware;

use App\Models\Access;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EnsureUserCanAccess
{
    /**
     * Ensure the user can visit the route based on DB info
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        $access = Access::where([
            ['location_id', '=', $user->location->id],
            ['occupation_id', '=', $user->occupation->id],
            ['rol_id', '=', $user->rol->id]
        ])->get();

        // Get current uri route
        $currentRoute = $request->route()->uri();
        // Conver route : uri array to just uri array
        $authorizedRoutes = Arr::flatten( $access->routes );

        // if current route is not in the authorizedRoutes array
        // redirect to 403 - Forbidden
        if( !in_array( $currentRoute, $authorizedRoutes ) )
        {
            return redirect("403");
        }
        
        // user has access
        return $next($request);
    }
}
