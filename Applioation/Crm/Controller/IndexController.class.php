<?php
namespace Applioation\Crm\Controller;
use Applioation\Crm\Controller\BaseController;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class IndexController extends BaseController{
	public function index(){
		$ReturnData = $this->GetCrmData(array('crmtype'=>'0501','memberid'=>'600127'));
		dump((json_decode($ReturnData,true)));
	}
}