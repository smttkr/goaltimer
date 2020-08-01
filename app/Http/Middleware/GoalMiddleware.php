<?php

namespace App\Http\Middleware;

use Closure;
use Hamcrest\Type\IsNumeric;

class GoalMiddleware
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
        if (is_numeric($request->goal_time)) {
            $goal_time = $request ->goal_time *60;
            $request ->merge(['goal_time' =>$goal_time]);
        }
        return $next($request);
    }
}
