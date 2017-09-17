<?php
namespace app\common\model;

use think\Model;

// 公共用户模型
class User extends Model
{
	//判断是否登录
	public function isLogin(){
		$user = session('user_auth');
		if (empty($user)){
			//判断是否记住登录
			if(cookie('?uid') && cookie('?signin_token')){   //?uid 表示是判断是否存在
				$user = $this::get(cookie('uid'));
				if($user){
					$signin_token = $this->dataAuthSign($user->username.$user->id.$user->last_login_time);
					if(cookie('signin_token') == $signin_token){
						//自动登录
						$this->autoLogin($user);
						return $user->id;
					}
				}
			}
		return 0;
		}else{
			return session('user_auth_sign') == $this->dataAuthSign($user) ? $user['uid'] : 0;
		}
	}
}