<?php
/**
 * 用于实例化访问控制器
 * @param string $name 控制器名
 * @param string $path 控制器命名空间（路径）
 * @return Think\Controller|false
 */
function controller($ClassData,$AppName,$GROUPS,$ActionNameData){
	include_once $ClassData['ApplicationPath'];
	$ControllerName = $ClassData['ControllerName'];
	$GroupsName = "";
	if (!empty($GROUPS)) {
		$GroupsName = $GROUPS."\\";
	}
	$NewName = "\\$GroupsName{$AppName}\Controller\\".$ControllerName;
    if(class_exists($NewName)) {
        return new $NewName();
    }else {
        return false;
    }
}

/**
 * 分析URL地址
 * @author jzz
 */
function GetUrlData(){
	$SE_STRING = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);
	$ary_se = explode('/', $SE_STRING);
	return $ary_se;
}

/**
 * [Debug 获取调试模式状态]
 * @param [type] $AppName [description]
 * @param [type] $GROUPS  [description]
 * @author jzz
 */
function Debug($AppName,$GROUPS){
	$GroupsName = "";
	if(defined("GROUPS")){
		$GroupsName = $GROUPS.'/';
	}
	include_once ROOT_PATH."/{$GroupsName}{$AppName}/Conf/Conf.php";
	return !empty(Config::$DEBUG)?Config::$DEBUG : false;
}

/**
 * [GetConfData 获取用户配置信息]
 * @param [type] $AppName [description]
 * @param [type] $GROUPS  [description]
 * @param [type] $Aregs   [description]
 * @author jzz
 */
function GetConfData($AppName,$GROUPS,$Aregs){
	$GroupsName = "";
	if(defined("GROUPS")){
		$GroupsName = $GROUPS.'/';
		
	}
	include_once ROOT_PATH."/{$GroupsName}{$AppName}/Conf/Conf.php";
	return !empty(Config::$$Aregs)?Config::$$Aregs : false;
}

/**
 * [GetIp 获取用户端IP]
 * @author jzz
 */
function GetIp() { 
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
    	$ip = getenv("HTTP_CLIENT_IP"); 
    } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
    	$ip = getenv("HTTP_X_FORWARDED_FOR"); 
    } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
    	$ip = getenv("REMOTE_ADDR"); 
    } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
    	$ip = $_SERVER['REMOTE_ADDR']; 
    } else {
    	$ip = "unknown"; 
    }
    return $ip; 
}

/**
 * [GetSaltString 对MD5后的字符串进行再次加密]
 * @param  string $CipherText 输入的字符串
 * @return [type] [string(加密后的字符串)]
 * @author jzz
 */
function GetSaltString($CipherText="") {
	$CipherText = md5($CipherText);
    if (!is_string($CipherText) || strlen($CipherText) < 31) {
        return FALSE;
    }
    $salt = substr($CipherText, 0, 4) . substr($CipherText, 18, 2) . substr($CipherText, -4);
    $returnString = md5($CipherText.$salt . $salt.$CipherText);
    //$returnString = md5($CipherText . $salt);
    return $returnString;
}

/**
 * 获取一个cookie对象
 * @author jzz
 */
function GetCookieObj(){
	$CookieObk = New \Core\Library\Driver\Cookie\Cookie();
	return $CookieObk;
}

/**
 * Cookies 操作
 * 设置一个Cookie
 * @author jzz
 */
function SetCookies($KeyName = '', $Records = '', $Time = '') {
	if (!empty($KeyName)) {
		$obj = GetCookieObj();
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		return $obj->set($KeyName, $Records, $Time, $domain);
	} else {
		\Core\Lib\System\Prompt::ViewError('设置 Cookie 时出现一个错误！');exit;
	}
}


/**
 * 获取一个已设置的Cookie
 * @param $key_name Cookie 键值
 * @author jzz
 */
function GetCookie($KeyName = '') {
	if (!empty($KeyName)) {
		$obj = GetCookieObj();
		return $obj->get($KeyName);
	} else {
		\Core\Lib\System\Prompt::ViewError('获取 Cookie 时出现一个错误！');exit;
	}
}

/**
 * 更新一个 Cookie
 * @param $key_name 键值 $records 需要更新的数据
 * @author jzz
 */
function EditCookie($KeyName = '', $Records = '') {
	if (!empty($KeyName)) {
		$obj = GetCookieObj();
		return $obj->update($KeyName, $Records);
	} else {
		\Core\Lib\System\Prompt::ViewError('更新 Cookie 时出现一个错误！');exit;
	}
}

/**
 * 删除一个 Cookie
 * @param $key_name 键值
 * @author jzz
 */
function DelCookie($KeyName = '') {
	if (!empty($KeyName)) {
		SetCookies($KeyName,'',time()-1000);
	} else {
		\Core\Lib\System\Prompt::ViewError('删除 Cookie 时出现一个错误！');exit;
	}
}

/**
 * 获取当前url
 * @author jzz
 */

function WebUrl($Url='') {
	//return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] .$Url;
    return 'http://' . $_SERVER['HTTP_HOST'] .$Url;
}

/**
 * 跳转到某个页面
 * @author jzz
 */
function ToUrl($Url='') {
	if (empty($Url)) {
		return false;
	}
	header("Location:" . WebUrl("$Url") . "");
}

function GetSystemConfig($Name=''){
    $config = require CORE_PATH.DS.'Library/Common/convention.php';
    if (!empty($Name)) {
        return $config[$Name];exit;
    }
    return $config;
}
/**
 * 获取和设置配置参数 支持批量定义
 * @param string|array $name 配置变量
 * @param mixed $value 配置值
 * @param mixed $default 默认值
 * @return mixed
 */

function C($name=null, $value=null,$default=null) {
    $_config = GetSystemConfig();
    // 无参数时获取所有
    if (empty($name)) {
        return $_config;
    }
    // 优先执行设置获取或赋值
    if (is_string($name)) {
        if (!strpos($name, '.')) {
            $name = strtoupper($name);
            if (is_null($value))
                return isset($_config[$name]) ? $_config[$name] : $default;
            $_config[$name] = $value;
            return null;
        }
        // 二维数组设置和获取支持
        $name = explode('.', $name);
        $name[0]   =  strtoupper($name[0]);
        if (is_null($value))
            return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
        $_config[$name[0]][$name[1]] = $value;
        return null;
    }
    // 批量设置
    if (is_array($name)){
        $config = array_merge($config, array_change_key_case($name,CASE_UPPER));
        return null;
    }
    return null; // 避免非法参数
}

/**
 * 设置和获取统计数据
 * 使用方法:
 * <code>
 * N('db',1); // 记录数据库操作次数
 * N('read',1); // 记录读取次数
 * echo N('db'); // 获取当前页面数据库的所有操作次数
 * echo N('read'); // 获取当前页面读取次数
 * </code>
 * @param string $key 标识位置
 * @param integer $step 步进值
 * @param boolean $save 是否保存结果
 * @return mixed
 */
function N($key, $step=0,$save=false) {
    static $_num    = array();
    if (!isset($_num[$key])) {
        $_num[$key] = (false !== $save)? S('N_'.$key) :  0;
    }
    if (empty($step)){
        return $_num[$key];
    }else{
        $_num[$key] = $_num[$key] + (int)$step;
    }
    // if(false !== $save){ // 保存结果
    //     S('N_'.$key,$_num[$key],$save);
    // }
    return null;
}

// /**
//  * 缓存管理
//  * @param mixed $name 缓存名称，如果为数组表示进行缓存设置
//  * @param mixed $value 缓存值
//  * @param mixed $options 缓存参数
//  * @return mixed
//  */
// function S($name,$value='',$options=null) {
//     static $cache   =   '';
//     if(is_array($options)){
//         // 缓存操作的同时初始化
//         $type       =   isset($options['type'])?$options['type']:'';
//         $cache      =   Core\Lib\System\Cache::getInstance($type,$options);
//     }elseif(is_array($name)) { // 缓存初始化
//         $type       =   isset($name['type'])?$name['type']:'';
//         $cache      =   Core\Lib\System\Cache::getInstance($type,$name);
//         return $cache;
//     }elseif(empty($cache)) { // 自动初始化
//         $cache      =   Core\Lib\System\Cache::getInstance();
//     }
//     if(''=== $value){ // 获取缓存
//         return $cache->get($name);
//     }elseif(is_null($value)) { // 删除缓存
//         return $cache->rm($name);
//     }else { // 缓存数据
//         if(is_array($options)) {
//             $expire     =   isset($options['expire'])?$options['expire']:NULL;
//         }else{
//             $expire     =   is_numeric($options)?$options:NULL;
//         }
//         return $cache->set($name, $value, $expire);
//     }
// }
