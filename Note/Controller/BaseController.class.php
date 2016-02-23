<?php
namespace Note\Controller;
use Core\Library\Controller\Kernel;
/**
* 此类由系统自动生成！
* @author jzz
*/
Class BaseController extends Kernel{

	/**
	 * [__construct 初始化程序，检查是否登录]
	 * @author jzz
	 */
	public function __construct(){
		parent::__construct();
		if (empty(GetCookie('MemberInfo'))) {
			Tourl('/Note/User/UserLogin');exit;
		}
	}
}