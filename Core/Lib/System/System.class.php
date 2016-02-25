<?php
namespace Core\Lib\System;
/**
 * 框架核心引导类 
 * @author jzz
 */
Class System_Core{
	public static $RouteData;
	private static $PageData = array();
	public static $GroupData;
	private static $AppInfos;
	public static $AppNameData;
	public static $ApplicationPath;
	private static $Prefix;

	/**
	 * 程序初始化
	 * @return [type] [description]
	 * @author jzz
	 */
	public static function start(){
		spl_autoload_register('Core\Lib\System\System_Core::autoload');      
		// // 设定错误和异常处理
		// register_shutdown_function('Think\Think::fatalError');
		// set_error_handler('Think\Think::appError');
		// set_exception_handler('Think\Think::appException');
		// 根据URL信息 新建应用 （bug 加判断，新建分组 and 非分组模式下 命名空间格式得修改）
		$ApplicationPath = CORE_PATH."/..";
		$AppName = "Home"; // 默认应用名称
		$ary_se = GetUrlData(); // 获取URL 分析后的数据
		$BootDir = explode(DS, getcwd());
		$BootDirName = $BootDir[count($BootDir)-1];
		if (!empty($ary_se['1'])&&$ary_se['1']!==$BootDirName) {
			$AppName = !empty($ary_se['1'])?$ary_se['1']:$AppName;
		}
		if (!empty($_REQUEST['g'])) {
			$roue = explode('/', $_REQUEST['g']);
			if (!empty($roue[0])) {
				$AppName = !empty($roue[0])?$roue[0]:$AppName;
			}

		}
		self::$AppNameData = $AppName; // 将应用名称存储到 变量中
		// 判断分组是否开启
		$GROUPS = "";
		if ( defined("GROUPS") ) {
			$GROUPS = GROUPS;
			$ApplicationPath = CORE_PATH."/../".GROUPS;
		}
		$InputString = " ";
		$InputData = array_merge($_GET,$_POST);
		if (!empty($InputData)) {
			foreach ($InputData as $key => $value) {
				$InputVal = $value;
				if (is_array($value)) {
					$InputVal = implode($value);
				}
				$InputString.="{$key}=>'$InputVal', ";
			}
		}

		self::$GroupData = $GROUPS;
		self::$ApplicationPath = $ApplicationPath;
		// 新建一个应用
		$AutoNewly = AutoNewly;
		if (!is_dir($ApplicationPath.DS.$AppName)) {
			if (defined("AutoNewly") && $AutoNewly==true) {
				$NewApplicationObj = New \Core\Lib\System\Appcheck($ApplicationPath, $AppName,$GROUPS);
				$NewApplicationObj->NewApplication();
			}else{
				\Core\Lib\System\Prompt::ViewError("404 {$AppName} => Modular Not Found");exit;
			}
		}
		/**
		 * 是否开启调试模式
		 * @var [type]
		 * @author jzz
		 */
		$DebugState = Debug($AppName,$GROUPS); //获取debug 状态
		if($DebugState){
			$DebugData = New \Core\Library\Driver\Debug();
			$DebugData->init_run();
		}
		// 渲染页面变量
		$StaticSData = GetConfData(self::$AppNameData,self::$GroupData,'StaticS');
		if (!empty($StaticSData)) {
			foreach ($StaticSData as $key => $value) {
				self::$PageData[][$key] = $value;
			}
		}
		// 实例化控制器
		$RouteObj = New \Core\Lib\System\Route($ApplicationPath,$AppName,$GROUPS);
		$RouteData = $RouteObj->__Executive();
		self::$RouteData = $RouteData;
		// 引入用户 公共函数库文件
		$UserCommonPath = $ApplicationPath.DS.$AppName.DS."Common/Common.php";
		include_once "$UserCommonPath";
		
		self::$AppInfos = $RouteData;
		if (is_file($RouteData['ApplicationPath'])) {
			$ActionNameData = explode('?', $RouteData['ActionName']);
			$ControllerObj = controller($RouteData,$AppName,$GROUPS,$ActionNameData);
			// 调用控制器的 初始化函数 _init；
			if (method_exists($ControllerObj,'_init')) {
				$ControllerObj->_init();
			}
			$ControllerObj->$ActionNameData['0']();
		}else{
			\Core\Lib\System\Prompt::ViewError("404 {$RouteData['ControllerName']} => Controller Not Found");exit;
		}
		/**
		 * [$LogObj 行为日志记录]
		 * @var [type]
		 */
		$stime = StartTime;
		$etime=microtime(true);//获取程序执行结束的时间
		$total=bcadd(($etime-$stime)*1000,0,2);   //计算差值
		$ImplementData = " 	[页面执行时间: {$total}毫秒]  "." 消耗：".\Core\Lib\System\System_Core::memory()." 内存\r\n";
		$ExecuteConf = GetConfData(self::$AppNameData,self::$GroupData,"Execute");
		if ($ExecuteConf==true) {
			echo "<span style='color:red;'>[页面执行时间: {$total}毫秒]  消耗：".\Core\Lib\System\System_Core::memory()." 内存</span>";
		}
		$ary_se['InputData'] = $InputString;
		$ary_se['ImplementData'] = $ImplementData;
		$LogObj = New \Core\Lib\System\Log();
		$LogsPath = C('LOG_FILE_PATH').$AppName.DS;
		if (!is_dir(C('DATA_RUNTIME_PATH'))) {
			mkdir(C('DATA_RUNTIME_PATH'));
			mkdir(C('LOGS_PATH'));
		}else if(!is_dir(LOGS_PATH)){
			mkdir(LOGS_PATH);
		}
		if (!is_dir($LogsPath)) {
			mkdir($LogsPath);
		}
		$LogObj->WriteLogs($ary_se,$LogsPath."VisitLog_".date('Y-m-d',time()).".txt");
	}

	/**
     * 类库自动加载
     * @param string $class 对象类名
     * @return void
     * @author jzz
     */
	public static function autoload($class){
		$ClassPath = ROOT_PATH.DS.$class.EXT;
		$ClassPath = realpath(str_replace('\\','/',$ClassPath));
		if (is_file($ClassPath)) {
			include_once $ClassPath;
		}
	}

	/**
	 * [BuildPageExampleObjs 实例化 页面渲染 对象]
	 * @param [type] $Methods   [方法名称]
	 * @param [type] $BuildPage [参数]
	 * @author jzz
	 */
	private static function BuildPageExampleObjs($Methods,$BuildPage){
		$AppName = self::$AppNameData;
		$AppInfos = self::$AppInfos;
		$ActionNameData = explode('?', $AppInfos['ActionName']);
		$ActionName = !empty($ActionNameData['0'])?$ActionNameData['0']:'index';
		$ControllerName = $AppInfos['ControllerNamePage'];
		$ApplicationPath = self::$ApplicationPath;
		$BuildPageName = !empty($BuildPage)?$BuildPage:$ActionName;
		$BuildPageExampleObj = new \Core\Library\View\BuildPageExample($AppName,$ActionName,$ControllerName,$ApplicationPath,self::$PageData);
		// 模板文件后缀名
		$Suffix = defined('Suffix') ? Suffix : ".html";
		if (!is_array($BuildPage)) {
			return $BuildPageExampleObj->$Methods($BuildPageName.$Suffix);exit;
		}
		return $BuildPageExampleObj->$Methods($BuildPageName);exit;
	}

	/**
	 * [assign 渲染页面 变量]
	 * @param  string $PageKey [键]
	 * @param  string $PageVal [值]
	 * @return [type]          [description]
	 * @author jzz
	 */
	public static function assign($PageKey='',$PageVal=''){
		$PageData = array();
		self::$PageData[][$PageKey] = $PageVal;
	}

	/**
	 * [display 页面渲染]
	 * @param  string $BuildPage [模板名称]
	 * @return [type]            [description]
	 * @author jzz
	 */
	public static function display($BuildPage=''){
		self::BuildPageExampleObjs("BuildPage",$BuildPage);
	}

	/**
	 * [DbObj 实例化数据库]
	 * @param string $MysqlType [数据库类型]
	 * @author jzz
	 */
	public static function DbObj($MysqlType='Mysql'){
		$MysqlConf = GetConfData(self::$AppNameData,self::$GroupData,"DbConfig");
		$MysqlData = !empty($MysqlConf[$MysqlType])?$MysqlConf[$MysqlType]:$MysqlConf;
		self::$Prefix = !empty($MysqlData['Prefix'])?$MysqlData['Prefix']:"";
		$MysqlObjs = New \Core\Lib\System\Db($MysqlData);
		return $MysqlObjs->GetInstance($MysqlData['DbType'],$MysqlData,self::$Prefix);
	}

	/**
	 * 获取框架消耗的内存
	 * @return string
	 * @author wave
	 */
	public static function memory(){
		$size = memory_get_usage(true);
		$unit = array('B','KB','MB','GB','TB','PB'); 
		return round($size/pow(1024,($i=floor(log($size,1024)))),2).''.$unit[$i]; 
	}
}