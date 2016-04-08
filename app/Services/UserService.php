<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserService {
	
	public function __construct(HasherContract $hasher) {//dd(Auth::user());//dd(Session::get('user'));
		$this->hasher = $hasher;
		$this->username = 'admin';
	}
	
	public function getUser() {
		$user = User::select('id', 'realname', 'mobile', 'email')
			->where('username', $this->username)
			->first();
		return $user;
	}
	
	public function putUser($params) {
		if(isset($params['mobile']) && $params['mobile']) {
			$updData['mobile'] = $params['mobile'];
		}
		if(isset($params['email']) && $params['email']) {
			$updData['email'] = $params['email'];
		}
		if(isset($params['realname']) && $params['realname']) {
			$updData['realname'] = $params['realname'];
		}
		if(isset($updData)) {
			$isUpdate = User::where('username', $this->username)->update($updData);
			if($isUpdate) {
				return array('status' => true, 'result' => '修改成功');
			} else {
				return array('status' => false, 'result' => '修改失败');
			}
		} else {
			return array('status' => true, 'result' => '尚未修改');
		}
	}
	
	/**
	 * 修改用户密码
	 * @param array $params (originPasswd, newPasswd, confirmPasswd)
	 */
	public function putPasswd($params) {
		$passwd = User::where('username', $this->username)->pluck('password');
		if(isset($params['originPasswd']) && $params['originPasswd'] && $this->hasher->check($params['originPasswd'], $passwd)) {
			if(isset($params['newPasswd']) && $params['newPasswd']) {
				if(isset($params['confirmPasswd']) && $params['confirmPasswd']) {
					if($params['newPasswd'] == $params['confirmPasswd']) {
						$updData['password'] = $this->hasher->make($params['newPasswd']);
						$isUpdate = User::where('username', $this->username)->update($updData);
						if($isUpdate) {
							return array('status' => true, 'result' => '修改成功');
						} else {
							return array('status' => false, 'result' => '修改失败');
						}
					} else {
						return array('status' => false, 'result' => '新密码和确认密码不符');
					}
				} else {
					return array('status' => false, 'result' => '确认密码有误');
				}
			} else {
				return array('status' => false, 'result' => '新密码有误');
			}
		} else {
			return array('status' => false, 'result' => '原始密码有误');
		}
	}
}