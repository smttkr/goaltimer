<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Goal;
use App\TimeRecord;

class BlockImpostor
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
        $user = Auth::user();
        if ($goal = $request->route()->parameter('goal')) {
            if ($user->id != $goal->user_id) {
                return redirect()->back();
            }
        }
        if ($timeRecord = $request->route()->parameter('timeRecord')) {
            if ($user->id != $timeRecord->user_id) {
                return redirect()->back();
            }
        }

        return $next($request);
    }
}
