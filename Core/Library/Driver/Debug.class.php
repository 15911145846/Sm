<?php
namespace Core\Library\Driver;
/**
 * File name Debug_Driver.php
 * debug类库驱动
 * @author jzz
 */
require_once CORE_PATH . "/Library/Driver/Whoops/Run.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Util/Misc.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Util/TemplateHelper.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Exception/Frame.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Exception/Formatter.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Exception/FrameCollection.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Exception/ErrorException.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Exception/Inspector.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Handler/HandlerInterface.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Handler/Handler.php";
require_once CORE_PATH . "/Library/Driver/Whoops/Handler/PrettyPageHandler.php";
Class Debug {

	public $debug = array();
	public function init_run() {
		$this->debug = $this->debug_initialize();
	}

	/**
	 * 系统调试类库
	 * @author jzz
	 */
	public function debug_initialize() {
		$whoops = new \Whoops\Run();
		$whoops_handler = new \Whoops\Handler\PrettyPageHandler();
		$whoops->pushHandler($whoops_handler);
		$whoops->register();
	}
}