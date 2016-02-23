<?php
ini_set("display_errors", "On");
header("Content-Type: text/html; charset=UTF-8");
defined('APP_PATH')     or define('APP_PATH',       dirname($_SERVER['SCRIPT_FILENAME']).'/');
defined('RUNTIME_PATH') or define('RUNTIME_PATH',   APP_PATH.'Runtime/');  // 系统运行时目录
defined('LOGS_PATH')    or define('LOGS_PATH',      RUNTIME_PATH.'Logs/'); // 应用日志目录
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/'); // 应用缓存目录
define('CORE_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('EXT','.class.php');
define('PWD', getcwd());
define("StartTime",microtime(true));
require CORE_PATH.DS.'Library/Common/common.php';
require CORE_PATH.DS.'Library/Common/functions.php';
// 加载核心System类
require CORE_PATH.DS.'Lib/System/System'.EXT;
// 应用初始化 
\Core\Lib\System\System_Core::start();