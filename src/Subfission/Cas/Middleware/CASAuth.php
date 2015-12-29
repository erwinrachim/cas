<?php namespace Subfission\Cas\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CASAuth {

	protected $config;
	protected $auth;
	protected $session;

	public function __construct(Guard $auth)
	{
        $this->auth = $auth;
		$this->config = config('cas');
		$this->session = app('session');
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			// We setup CAS here to reduce the amount of objects we need to build at runtime.  This
			// way, we only create the CAS calls if the user has not yet authenticated.
			$cas = app('cas');
			$cas->authenticate();
			session()->put('cas_user', $cas->User());
		}

		return $next($request);
	}
}