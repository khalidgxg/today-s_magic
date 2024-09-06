<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DeleteEmptyAndNullStrings
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        foreach ($request->all() as $key => $value) {

            if (!isset($value) || $value == null) {
                unset($request[$key]);
            }
            if (is_array($value)) {

                $request[$key] = array_filter($value, function ($value) {
                    return $value !== null && $value !== false && $value !== '';
                });

            }
        }

        return $next($request);
    }
}
