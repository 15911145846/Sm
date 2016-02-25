<?php
namespace Core\Library\Controller;
use Core\Lib\System\Vendor;
/**
 * 控制器基类
 * @author jzz
 */
abstract Class Kernel extends Vendor{
	private $postdata;
	private $DbTypeDta;

	/**
	 * [__construct 构造方法]
	 * @author jzz
	 */
	public function __construct(){
		// 获取post && get 数据
		$GetInputData = $this->GetInput();
		// 处理post && get 数据 ，将数据赋值给一个新建的变量
		$this->HandleInputData($GetInputData);
		// 自动加载类文件
		$this->registerAutoload();
	}

	/**
	 * [HandleInputData POST与GET数据处理]
	 * @param array $GetInputInfo [POST与GET数据]
	 * @author jzz
	 */
	private function HandleInputData(array$GetInputInfo){
		if (!empty($GetInputInfo)) {
		 	foreach ($GetInputInfo as $key => $value) {
		 		$this->$key = $value;
		 	}
		}
	}

	/**
	 * [GetDbObj 获取数据库实例化对象]
	 * @param [type] $DbTypeDta [数据库类型]
	 * @author jzz
	 */
	private function GetDbObj($DbTypeDta){
		$SystemObj = New \Core\Lib\System\System_Core();
		return $SystemObj::DbObj($DbTypeDta);
	}

	/**
	 * [__get 处理未定义属性]
	 * @param  [type] $Attributename [属性名称]
	 * @author jzz
	 */
	public function __get($Attributename){
		return $this->$Attributename = NULL;
	}

	/**
	 * [__call 处理未定义方法]
	 * @param  [type] $Method [方法名]
	 * @param  [type] $args   [参数]
	 * @author jzz
	 */
	public function __call($Method,$args){
		switch ($Method) {
			case 'where':
				# code...
				break;
			case 'db':
				$DbTypeInfo = !empty($args[0])?$args[0]:"mysql";
				$this->DbTypeDta = $DbTypeInfo;
				$DbObj = $this->GetDbObj($this->DbTypeDta);
				return $DbObj;break;
			default: 
				$this->Error("404 {$Method} => Method Not Found");break;
		}
	}

	/**
	 * [http CURL 实现GET和POST请求URL]
	 * @param  string  $url        [目标网址]
	 * @param  string  $method     [传参类型]
	 * @param  array   $postfields [参数]
	 * @param  array   $headers    [header头信息]
	 * @param  boolean $debug      [调试模式，默认为false]
	 * @return [type]              [数组]
	 * @author jzz
	 */
	public function http($url = '', $method = 'POST', $postfields = array(), $headers = array(), $debug = false) {
		$ch = curl_init();
		/* 初始化一个CURL */
		$get_url = "?";
		// 模拟浏览器提交表单
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:44.0) Gecko/20100101 Firefox/44.0"); 
		//curl_setopt($ci, CURLOPT_USERAGENT,"Mozilla/5.0 (iPhone; CPU iPhone OS 9_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E5191d Safari/601.1");
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		curl_setopt($ch, CURLOPT_USERPWD, 'zhizhong.jia:1538fbf2179d8b82');
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (!empty($method)) {
			switch ($method) {
			case 'POST':
				curl_setopt($ch, CURLOPT_POST, 1);
				if (!empty($postfields)) {
					curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
					$this->postdata = $postfields;
				}
				break;
			case 'GET':
				foreach ($postfields as $key => $value) {
					$get_url .= $key . "=$value&";
				}
				break;
				
			}
		}
		//echo $url.substr($get_url,0,-1);echo "<br/>";
		curl_setopt($ch, CURLOPT_URL, $url . substr($get_url, 0, -1));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		$response = "";
		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($debug != false) {
			echo "=====post data======\r\n";
			var_dump($postfields);
			echo '=====info=====' . "\r\n";
			print_r(curl_getinfo($ch));
			echo '=====$response=====' . "\r\n";
			print_r($response);
		}
		return array($http_code, $response);
	}

	/**
	 * 加密算法
	 * @author jzz
	 */
	public function encrypt($data, $key, $char = '', $str = '') {
		$key = md5($key);
		$x = 0;
		$len = strlen($data);
		$l = strlen($key);
		for ($i = 0; $i < $len; $i++) {
			if ($x == $l) {
				$x = 0;
			}
			$char .= $key{$x};
			$x++;
		}
		for ($i = 0; $i < $len; $i++) {
			$str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
		}
		return base64_encode($str);
	}

	/**
	 * 解密算法
	 * @author jzz
	 */
	public function decrypt($data, $key, $char = '', $str = '') {
		$key = md5($key);
		$x = 0;
		$data = base64_decode($data);
		$len = strlen($data);
		$l = strlen($key);
		for ($i = 0; $i < $len; $i++) {
			if ($x == $l) {
				$x = 0;
			}
			$char .= substr($key, $x, 1);
			$x++;
		}
		for ($i = 0; $i < $len; $i++) {
			if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
				$str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
			} else {
				$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
			}
		}
		return $str;

	}

	/**
	 * [get_ip 获取用户ip信息]
	 * @param  string $ip_str [ip地址]
	 * @author jzz
	 */
	public function GetIp($ip_str = '') {
		$ip = new ip();
		$addr = $ip->ip2addr($ip_str);
		return $addr;
	}

	/**
	 * [GetInputAll 获取url 传参]
	 * @param string $type [获取类型]
	 * @author jzz
	 */
	public function GetInputAll($type='G') {
		$PostData = $_POST;
		$GetData = $_GET;
		$IuputInfo = array();
		if ($type=='P') {
			$IuputInfo = !empty($PostData) ? $PostData : "";
		}else{
			$IuputInfo = !empty($GetData) ? $GetData : "";
		}
		return $IuputInfo;
	}

	/**
	 * [GetInput 获取 post and get 传值]
	 * @param string  $Key      [description]
	 * @param integer $defaults [description]
	 * @author jzz
	 */
	public function GetInput($Key='',$defaults=0){
		$InputData = array_merge($_GET,$_POST);
	    if (!empty($Key)) {
	        return !empty($InputData[$Key])?$InputData[$Key]:$defaults;exit;
	    }
	    return $InputData;//$_REQUEST;
	}

	/**
	 * [Error 错误提示]
	 * @param string $PromptData    [提示语]
	 * @author jzz
	 */
	public function Error($PromptData=''){
		\Core\Lib\System\Prompt::ViewError("{$PromptData}");
	}

	/**
	 * [PageJump 转跳提示]
	 * @param string $message    [提示语]
	 * @param string $jumpUrl    [目标URL]
	 * @param string $waitSecond [转跳时间(秒)]
	 * @author jzz
	 */
	public function PageJump($message='',$jumpUrl='',$waitSecond='3'){
		\Core\Lib\System\Prompt::PageJump($message,$jumpUrl,$waitSecond);
	}

	/**
	 * [assign 渲染页面变量]
	 * @param  string $PageKey [健]
	 * @param  string $PageVal [值]
	 * @return [type]          [string]
	 * @author jzz
	 */
	public function assign($PageKey='',$PageVal=''){
		\Core\Lib\System\System_Core::assign($PageKey,$PageVal);
	}

	/**
	 * [display 页面渲染]
	 * @param  string $BuildPage [方法名称]
	 * @return [type]            [description]
	 * @author jzz
	 */
	public function display($BuildPage=''){
		\Core\Lib\System\System_Core::display($BuildPage);
	}

	/**
     * [GetSaltString 对MD5后的字符串进行再次加密]
     * @param  string $CipherText 输入的字符串
     * @return [type] [string(加密后的字符串)]
     * @author jzz
     */
    public function GetSaltString($CipherText="") {
    	$CipherText = md5($CipherText);
        if (!is_string($CipherText) || strlen($CipherText) < 31) {
            return FALSE;
        }
        $salt = substr($CipherText, 0, 4) . substr($CipherText, 18, 2) . substr($CipherText, -4);
        $returnString = md5($this->encrypt($CipherText,$salt) . $this->encrypt($salt,$CipherText));
        //$returnString = md5($CipherText . $salt);
        return $returnString;
    }

    /**
     * [Page 数据分页]
     * @param [type] $total    [数据集的总条数]
     * @param [type] $pagesize [每页显示的数量]
     * @author jzz
     */
    public function Page($total=1,$pagesize=1){
    	$Page = New \Core\Lib\Expansion\Util\Page($total,$pagesize);
    	return $Page->showpage();
    }

    
    public function MailSend() {
		
	}
}
// 设置控制器别名 便于升级
class_alias('Core\Library\Controller\Kernel','Sm\Action');