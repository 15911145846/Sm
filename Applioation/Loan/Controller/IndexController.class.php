<?php
namespace Applioation\Loan\Controller;
use Applioation\Loan\Controller\BaseController;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class IndexController extends BaseController{
	public function index(){
		// // echo M('Note.Model.Notes')->
		// // 	where(array('id'=>'1'))->
		// // 	other("order by id desc")->
		// // 	insert('User',array('id'=>'aaa','ccc'=>'ddd'));
		// $Data = M('Loan.Model.User')->where(array('id'=>array(1,2,3)))->other("order by id desc")->find('User');
		// //$Data = M('Note.Model.User')->where(array('id'=>1))->edit('User',array('PassWord'=>md5('123')));
		// dump($Data);
		// // $datawx = $this->http("https://m.baidu.com/index.jsp");
		// // echo $datawx['1'];
		// 
		$this->display();
	}
}