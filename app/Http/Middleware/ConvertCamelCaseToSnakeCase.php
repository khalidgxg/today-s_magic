<?php

namespace App\Http\Middleware;

use Closure;

class ConvertCamelCaseToSnakeCase
{
    public function handle($request, Closure $next)
    {
        $parameters = $request->all();
        $snake_case_parameters = convertKeysToSnakeCase($parameters);
        $request->replace($snake_case_parameters);
        return $next($request);
    }

}
