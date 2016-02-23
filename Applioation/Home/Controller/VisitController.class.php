<?php
namespace Applioation\Home\Controller;
use Applioation\Home\Controller\UserController;

/**
* @author jzz
* 此类由系统自动生成！
*/
Class VisitController extends UserController{

	public function index(){
		$ReturnData = array(0=>'',1=>'');
		// if (!empty($this->S)&&$this->S=='V') {
		// 	$ReturnData = $this->VisitHttps($this->url);
		// }else{
		// 	dump($_SERVER,1);
		// }
		$this->assign('ReturnData',$ReturnData);
		$this->display();
	}

	private function VisitHttps($UrlData="https://www.baidu.com"){
		$ReturnData = $this->http("$UrlData","GET");
		return $ReturnData;
	}

	public function pages(){
		$arrays = array(
				0=>'a',
				1=>'b',
				2=>'c'
			);
		echo ceil(count($arrays)/10);
	}
}