<?php namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;
use Illuminate\Contracts\Auth\Guard;
// use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

class AuthApi {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth, UserService $userService)
    {
        $this->auth = $auth;
        $this->userService = $userService;
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
            return Response::json('没有权限', 401);
        }
        if (!$this->auth->user()->is_admin) {
            return Response::json('没有权限', 401);
        }
        return $next($request);
	}
}
