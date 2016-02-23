<?php
namespace Applioation\Loan\Controller;
use Core\Library\Controller\Kernel;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class BaseController extends Kernel{

	/**
	 * [__construct 初始化程序，检查是否登录]
	 * @author jzz
	 */
	public function _init(){
		$Userinfo = $this->decrypt(GetCookie('Member'),md5('jzz'));
		if (empty($Userinfo)) {
			Tourl('/Loan/User/index');exit;
		}
	}
}