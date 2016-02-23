<?php
namespace Core\Lib\System;
/**
 * File name Appcheck.class.php
 * 递归新建文件夹
 * @author jzz
 */
Class Appcheck{

	private $GroupName;
	private $Application;
	private $ApplicationPath;

	public function __construct($ApplicationPath,$Application,$GroupName){
		$this->GroupName = $GroupName;
		$this->Application = $Application;
		$this->ApplicationPath = $ApplicationPath.DS;
		$this->mkdirs($this->ApplicationPath);
	}

	private function mkdirs($dir, $mode = 777) {
		if (!empty($dir) && !empty($mode)) {
			if (is_dir($dir) || mkdir($dir)) {
				return TRUE;
			}
			if (!mkdirs(dirname($dir), $mode)) {
				return FALSE;
			}
			chmod($dir, $mode);
			return mkdir($dir);
		}
	}

	public function NewApplication() {
		/**
		 * 循环新建文件夹
		 * @author jzz
		 */
		// echo $this->ApplicationPath.DS.$this->Application;exit;
		$this->mkdirs($this->ApplicationPath.$this->Application);
		$dir_info = array("{$this->Application}" => array('Common', 'Conf', 'Controller','Lib' => array('ORG'), 'Model', 'Service','Upload', 'View' => array('Index')));
		foreach ($dir_info as $key => $val) {
			$this->mkdirs($this->ApplicationPath .DS. $key);
			foreach ($val as $k => $v) {
				if (!is_array($v)) {
					$this->mkdirs($this->ApplicationPath .DS. $key .DS. $v);
				} else {
					foreach ($v as $kt => $vt) {
						$this->mkdirs($this->ApplicationPath .DS. $key .DS. $k);
						$this->mkdirs($this->ApplicationPath .DS. $key .DS. $k .DS. $vt);
					}
				}
			}
		}
		/**
		 * 新建文件
		 * @author jzz
		 */
		fclose(fopen($this->ApplicationPath .DS."{$this->Application}/Common/Common.php", 'wb ')); //新建文件命令
		$fopen_a = fopen($this->ApplicationPath .DS. "{$this->Application}/Conf/Conf.php", 'wb '); //新建文件命令
		fputs($fopen_a, '<?php' . "\r\n" . "Class Config{\r\n	public static \$StaticS = array();\r\n	public static \$Execute = false; //显示框架运行情况\r\n	public static \$DEBUG = array('state' => true); //开启调试模式\r\n}");
		fclose($fopen_a);
		$counter_file = $this->ApplicationPath .DS. "{$this->Application}/Controller/IndexController.class.php";
		$fopen = fopen($counter_file, 'wb '); //新建文件命令
		$GroupName = "";
		if (!empty($this->GroupName)) {
			$GroupName = $this->GroupName."\\";
		}
		fputs($fopen, '<?php' . "\r\nnamespace {$GroupName}{$this->Application}\Controller;\r\nuse Core\Library\Controller\Kernel;" . "\r\n/**\r* @author jzz\r* 此类由系统自动生成！\r*/\rClass IndexController extends Kernel{\r\n	public function index(){\r\n		echo '<style type=\"text/css\">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: \"微软雅黑\"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style=\"padding: 24px 48px;\"> <h1>:)</h1><p>欢迎使用 <b>SM框架</b>！</p></div>';\r\n	}\r\n}");
		fclose($fopen);
	}
}