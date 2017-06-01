<?php

namespace App\Http\Middleware;

use Closure,Auth;

class RedirectIfNotStudentAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'student_admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/student/login');
        }
        return $next($request);
    }
}
