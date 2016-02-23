<?php
namespace Applioation\credit\Controller;
use Core\Library\Controller\Kernel;

/**
* @author jzz
* 此类由系统自动生成！
*/
Class IndexController extends Kernel{
	//构造函数
	public function _init(){
		//echo "构造函数";
	}
	public function index(){
		//dump($this);
		//SetCookies('aa','bb',120);
		//echo GetCookie('aa');
		//
		// $FileCache = New \Core\Library\Driver\Cache\File();
		// $FileCache->set('aassa','bbbb',120);
		echo $this->encrypt('代','jzz');echo "</br>";
		echo $this->encrypt('份','jzz');echo "</br>";
		echo $this->decrypt('HR/W','jzz');echo "</br>";
		echo $this->decrypt('HR/a','jzz');echo "</br>";
		echo $this->decrypt('HvS3TN/v','jzz');echo "</br>";
		echo $this->decrypt('HvS3TN/w','jzz');echo "</br>";
		echo $this->decrypt('HvS3TN/j','jzz');echo "</br>";
		echo $this->decrypt('Ig/LSvEY','jzz');echo "</br>";
	}

	public function FormYz(){
		$this->display();
	}

	public function FormYzDo(){
		dump($this,1);
	}

	public function test(){
		// $EncodeData = base64Encode('贾志忠');
		// echo base64Decode($EncodeData);
		// echo PHP_EOL;
		// echo $EncodeData;
		// $this->display();
		// MessageSend
		$SendType = $this->SendType;
    	$Sms = array('sms','email_sms','sms_message','email_sms_message');
        $Email = array('email','email_sms','email_message','email_sms_message');
        if (in_array($SendType,$Sms)) {
        	echo $SendType.'</br>';
        }
        if (in_array($SendType,$Email)) {
        	echo $SendType;
        }
	}

	public function sendtext(){
		// $InputData = $this->GetInput();
		// $url = "https://www-develop.migang.com/shot_message_api.php";
		// $ReturnData = $this->http("$url","GET",$InputData,array(),false);
		// dump($ReturnData);
		//dump($this->MailSend());
		// $a = 0;
		// $b = 1;
		// $c = $a+$b;
		// echo $c;
		// $InputData = array(
		// 		'name' => 'Jiazz199508',
		// 		'pass' => 'jia980709',
		// 		'phone' => '15911145846',
		// 		'radomcode' => '161629',
		// 		'phonecode' => '',
		// 		'yaoqingma' => '803326',
		// 		'ok' => 'yes'
		// 	);
		// $url = "https://www.wangcaigu.com/user/code2";
		// $ReturnData = $this->http("$url","POST",$InputData,array(),false);
		// dump($ReturnData,1);
	}

	public function db(){
		$ModelObj = M('Note.Model.Notes');
		if (empty($this->databases)) {
			$DbList = $ModelObj->query("SHOW DATABASES;");
			$this->assign('DbList',$DbList);
		}
		$ModelObj->query('USE '.$this->databases);
		//var_dump($ModelObj->query('SHOW TABLES;'));exit;
		//$this->display();
	}


	public function phptesta(){
		$name = $this->name;
		$aa = $this->phptestb('1112sa',$name);
		dump($aa,1);
	}

	public function phptestb($a='',$b=''){
		return $b;
	}

	public function mail(){
		$email_address = "766248447@qqq.com";
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([A-Za-z]+\\.[A-Za-z]{2,3}(\\.[A-Za-z]{2})?)$/i";
		if (!preg_match( $pattern, $email_address )) {
			echo "NO";exit;
		}
		echo "YES";
	}
}