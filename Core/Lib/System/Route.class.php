<?php
namespace Core\Lib\System;
/**
 * 路由分发
 * @author: jzz
 */

Class Route{
	private $AppName;
	private $ApplicationPath;

	public function __construct($CORE_PATH,$APPNAME){
		$this->AppName = $APPNAME;
		$this->ApplicationPath = $CORE_PATH;
	}
	/**
	 * [__Executive 拼接URL 实例化用户控制器]
	 * @return [type] [description]
	 * @author jzz
	 */
	public function __Executive(){
		$ary_se = array();
		$SE_STRING = "";
		$Executive = array();
		$ROUTECONF = ROUTECONF;
		if (defined("ROUTECONF") && $ROUTECONF==true) {
			if (!empty($_REQUEST['g'])) {
				$roue = explode('/', $_REQUEST['g']);
			}
		}else{
			$ary_se = GetUrlData();
			$se_count = count($ary_se);
		}
		$controller_m = !empty($ary_se['2'])?$ary_se['2']:"Index";
		$action_a = !empty($ary_se['3'])?$ary_se['3']:"index";
		$action_a = $this->UrlAnalysis($action_a);
		if (empty($ary_se)) {
			$controller_m = !empty($roue['1'])?$roue['1']:'Index';
			$action_a = !empty($roue['2'])?$roue['2']:'index';
			$action_a = $this->UrlAnalysis($action_a);
		}

		$path_data = explode(DIRECTORY_SEPARATOR, getcwd());
		$Executive['ControllerName'] = !empty($controller_m)?$controller_m."Controller":'IndexController';
		$Executive['ActionName'] = !empty($action_a)?$action_a:'index';
		$Executive['ApplicationPath']  = realpath($this->ApplicationPath."/".$this->AppName.'/Controller/'.$controller_m."Controller.class.php");
		$Executive['ControllerNamePage'] = !empty($controller_m)?$controller_m:"Index";
		return $Executive;
	}

	private function UrlAnalysis($ActionInfo){
		$ActionNameInfo = explode('?', $ActionInfo);
		$ActionNameData = !empty($ActionNameInfo['0'])?$ActionNameInfo['0']:'index';
		if (strpos($ActionNameData,"&")) {
			$ActionNameInfo = array();
			$ActionNameInfo = explode('&', $ActionNameData);
			return !empty($ActionNameInfo['0'])?$ActionNameInfo['0']:'index';
		}else{
			return $ActionNameData;
		}
	}

}