<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class ApprovalMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (auth()->user()->approved_status == 'pending') {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.yourAccountNeedsAdminApproval'));
            }elseif(auth()->user()->approved_status == 'rejected') {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.yourAccountNeedsAdminRejected'));
            }
        }

        return $next($request);
    }
}
