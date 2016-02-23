<?php
namespace Applioation\Home\Controller;
use Core\Library\Controller\Kernel;

/**
* @author jzz
* 此类由系统自动生成！
*/
Class ExcelController extends Kernel{
	public function index(){
		// $ReadExcelObj = New \Core\Lib\Expansion\ORG\ExcelHandle("/Library/WebServer/Documents/b/jiuye/1310_Android.xls");
		// var_dump($ReadExcelObj->ReadFileData());
		//import("Home.Lib.ORG.ExcelHandle");
		// $ReadExcelObj = New \Home\Lib\ORG\ExcelHandle("/Library/WebServer/Documents/b/jiuye/1310_Android.xls");
		// dump($ReadExcelObj->ReadFileData());
		// //$this->display();
		// //echo 32+30+135+39.99+195;
		// echo date('r', "1450540799");
		// 
		//$NoteData = M('Home.Model.Notes')->query("UPDATE `blog`.`pt_log_copy` set `u_id`='21' where `l_id`='51' ");
		// $NoteData = M('Home.Model.Note')->query("SELECT * FROM pt_log_copy limit 2 ",'blog');
		// dump($NoteData);
		// dump($this,1);
		// $data = array(array('1','182.92.150.116','2016-01-20 21:22:20'));
		// $ReadExcelObj = New \Home\Lib\ORG\ExcelImport();
		// $ReadExcelObj->GetExcel('aaa',array('uid','ip','时间'),$data,'行为日志');
		$this->PageJump('登录成功','/Home/Index/index',10);
	}

	public function login(){
		//dump($this);
		$str = "GetRegionData";
		$array=preg_split("/(?=[A-Z])/",$str);
    	dump($array);
	}

	public function test(){
		echo $this->GetSaltString('admin123');
	}
}
