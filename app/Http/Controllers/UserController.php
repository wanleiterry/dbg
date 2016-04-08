<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService) {
		$this->userService = $userService;
    }

    public function showUser(Request $request) {dd($request->user());
    	$result = $this->userService->getUser();
    	return Response::json($result, 200);
    }

    public function updateUser(Request $request) {
    	$result = $this->userService->putUser($request->all());
    	return Response::json($result, 200);
    }
    
    public function updatePasswd(Request $request) {
    	$result = $this->userService->putPasswd($request->all());
    	return Response::json($result, 200);
    }
   
}
