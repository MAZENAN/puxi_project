<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Route;

class CheckRbac {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$auth = Auth::guard('admin')->user();
		$route = Route::currentRouteAction();
		if ($auth->role->id != 1) {
			$str = strtolower($auth->role->auth_ac . ',IndexController@index,' . 'IndexController@welcome)');
			$ac = strtolower(substr(strrchr($route, '\\'), 1));
			if (strpos($str, $ac) === false) {
				exit('<h1>您没有权限</h1>');
			}
		}

		return $next($request);
	}
}
