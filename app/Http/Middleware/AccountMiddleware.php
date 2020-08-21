<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Account;
use Illuminate\Support\Facades\Validator;

class AccountMiddleware
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
        if (!Auth::Check()) return back();
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();

        if ($account == null) return redirect()->route('account.create');
        else return $next($request);
    }
}
