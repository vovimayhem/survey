<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Result;

class SurveyCompleted
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
        $case_id = $request->route()->parameter('case');
        $result = Result::where('case_number', $case_id)->where('status', '1')->get();
        if ( !$result->isEmpty() ) {
            abort('410');
        }
        return $next($request);
    }
}
