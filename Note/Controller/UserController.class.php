<?php
namespace Note\Controller;
use Core\Library\Controller\Kernel;
/**
* 此类由系统自动生成！
* @author jzz
*/
Class UserController extends Kernel{

	/**
	 * [UserLogin 用户登录页面]
	 * @author jzz
	 */
	public function UserLogin(){
		DelCookie('Member');
		DelCookie('MemberInfo');
		$this->display();
	}

	/**
	 * [UserLoginDo 验证用户登录信息]
	 * @author jzz
	 */
	//
	public function UserLoginDo(){
		if (!empty($this->username)&&!empty($this->userpwd)) {
			$UserObj = M('Note.Model.User');
			$UserInfo = $UserObj->CheckUserInfo($this->username,md5($this->userpwd));
			if (!empty($UserInfo)) {
				$UserObj->AddUserLoginLogs($UserInfo['user_id'],$_SERVER['REMOTE_ADDR']);
				SetCookies('Member',$this->encrypt($UserInfo['user_id'],$this->GetSaltString($UserInfo['user_name'])),21600);
				SetCookies('MemberInfo',$this->GetSaltString($UserInfo['user_name']),21600);
				Tourl('/Note/Index/index');exit;
			}
			Tourl('/Note/User/UserLogin');exit;
		}
		Tourl('/Note/User/UserLogin');
	}

	/**
	 * [OutLogin 用户登出]
	 * @author jzz
	 */
	public function OutLogin(){
		DelCookie('Member');
		DelCookie('MemberInfo');
		Tourl('/Note/User/UserLogin');
	}
}