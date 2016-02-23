<?php
namespace Core\Lib\System;
/**
 * 错误提示页面
 * @author jzz
 * To::page_jump('登录失败','','/index.php/Index/index');
 */
Class Prompt{
	static function ViewError($ms=''){
		require PWD.DS."Core".DS."Library".DS."TplFile".DS."ViewError.tpl";exit;
	}

	static function PageJump($message='',$jumpUrl='',$waitSecond='3'){
		require PWD.DS."Core".DS."Library".DS."TplFile".DS."PageJump.tpl";exit;
	}
}