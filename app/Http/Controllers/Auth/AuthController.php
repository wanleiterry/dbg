<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

//    /**
//     * Where to redirect users after login / registration.
//     *
//     * @var string
//     */
//   protected $redirectTo = '/admin/user.json';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['postLogin', 'getLogout']]);
    }

//     /**
//      * Get a validator for an incoming registration request.
//      *
//      * @param  array  $data
//      * @return \Illuminate\Contracts\Validation\Validator
//      */
//     protected function validator(array $data)
//     {
//         return Validator::make($data, [
//             'name' => 'required|max:255',
//             'email' => 'required|email|max:255|unique:users',
//             'password' => 'required|confirmed|min:6',
//         ]);
//     }

//     /**
//      * Create a new user instance after a valid registration.
//      *
//      * @param  array  $data
//      * @return User
//      */
//     protected function create(array $data)
//     {
//         return User::create([
//             'name' => $data['name'],
//             'email' => $data['email'],
//             'password' => bcrypt($data['password']),
//         ]);
//     }

    public function getLogin() {
    	return view('admin/login');
    }
    
    public function postLogin() {
    	$input = array(
    			'username' => Input::get('username'),
    			'password' => Input::get('password')
    	);
    	
    	$rules = array (
    			'username' => 'required',
    			'password' => 'required'
    	);
    	
    	$validator = Validator::make($input, $rules);
    	if($validator->fails()) {
    		return Response::json(['error' => ['message'=>$validator->getMessageBag()->toArray(), 'type'=>'Auth', 'code'=>401]]);
    	} else {
    		//认证凭证
    		$credentials = [
    			'username' => Input::get('username'),
    			'password' => Input::get('password')
    		];
    		if(Auth::validate($credentials)) {
    			Auth::login(Auth::getLastAttempted(), true);
    			return Response::json(['success'=>true], 200);
    		} else {
    			return Response::json(['error'=>['message'=>['login'=>['“用户名”或“密码”错误，请重新登录！']], 'type'=>'Auth', 'code'=>401]]);
    		}
    	}
    }
    
    public function getLogout() {
    	Auth::logout();
    	return redirect()->guest('auth/login');
    }
}
