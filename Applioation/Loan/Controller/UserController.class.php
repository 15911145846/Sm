<?php
namespace Applioation\Loan\Controller;
use Core\Library\Controller\Kernel;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class UserController extends Kernel{

	/**
	 * [index 登录页面]
	 * @return [type] [description]
	 * @author jzz
	 */
	public function index(){
		$Userinfo = $this->decrypt(GetCookie('Member'),md5('jzz'));
		$this->display();
		if (!empty($Userinfo)) {
			Tourl('/Loan/Index/index');exit;
		}
	}

	/**
	 * [UserLoginDo 登录验证方法]
	 * @author jzz
	 */
	public function UserLoginDo(){
		$UserModelObj = M('Loan.Model.User');
		$UserInfo = $UserModelObj->UserLoginCheck($this->UserName,$this->Password);
		if (!empty($UserInfo)) {
			SetCookies('Member',$this->encrypt($UserInfo['id']."_".$UserInfo['UserName'],md5('jzz')),3600);
			Tourl('/Loan/Index/index');exit;
		}
		Tourl('/Loan/User/index');exit;
	}
}