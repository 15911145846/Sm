<?php
/**
 * [dump 调试方法]
 * @param  string $inputArray [传入的参数]
 * @return [type]             [description]
 */
function dump($inputArray = "", $state = 0) {
	require PWD.DS."Core".DS."Library".DS."TplFile".DS."dump.tpl";
}

/**
 * [M 实例化一个model ]
 * @param [type] $OrgInfo [model信息]
 * @return [type] Object
 * @author jzz
 */
function M($OrgInfo,$Db='mysql'){
	if (empty($OrgInfo)) {
		return false;
	}
	$OrgPathInfo = PWD."/".str_replace('.','/',$OrgInfo).".model.php";
	$ModelInfo = explode('.', $OrgInfo);
	if (!empty($OrgInfo) && !is_file($OrgPathInfo)) {
		\Core\Lib\System\Prompt::ViewError("调用模型 {$OrgInfo} 失败！");
	}
	require $OrgPathInfo;
	$ModelObj = New $ModelInfo[count($ModelInfo)-1]($Db);
	return $ModelObj;
}

/**
 * 解密算法
 * @author jzz
 */
function decrypt($data, $key, $char = '', $str = '') {
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