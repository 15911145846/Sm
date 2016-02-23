<?php
namespace Core\Library\View;

/**
 * 页面渲染
 * @author jzz 
 */
Class BuildPageExample{
	private $AppName;
	private $ActionName;
	private $ControllerName;
	private $ApplicationPath;
	public $PageData = array();

	/**
	 * [__construct 初始化页面渲染信息]
	 * @param [type] $AppName         [当前应用名称]
	 * @param [type] $ActionName      [当前方法名称]
	 * @param [type] $ControllerName  [当前控制器名称]
	 * @param [type] $ApplicationPath [当前控制器路径]
	 * @author jzz
	 */
	public function __construct($AppName,$ActionName,$ControllerName,$ApplicationPath,$PageData){
		$this->AppName = $AppName;
		$this->PageData = $PageData;
		$this->ActionName = $ActionName;
		$this->ControllerName = $ControllerName;
		$this->ApplicationPath = $ApplicationPath;
	}

	/**
	 * [BuildPage 页面渲染]
	 * @param string $BuildPage [页面模板名称]
	 * @author jzz
	 */
	public function BuildPage($BuildPage='Index.html'){
		$BuildPageInfo = "";
		ob_start();
		$PageData = $this->PageData;
		if (!empty($PageData)) {
			foreach ($PageData as $key => $val) {
				foreach ($val as $k => $v) {
					$$k = $v;
				}
			}
		}
		$AppViewPath = $this->ApplicationPath.'/'.$this->AppName.'/View'."/{$this->ControllerName}/$BuildPage";
		if (!is_file($AppViewPath)) {
			\Core\Lib\System\Prompt::ViewError("Template {$BuildPage} not found ");exit;
		}
		$InputDataOne = "";
		$GetInputInfo = array_merge($_GET,$_POST);
		if (!empty($GetInputInfo)) {
			foreach ($GetInputInfo as $key => $value) {
				$InputDataOne = $key.$value;
			}
		}
		// 创建缓存文件夹
		$CachePath = C('DATA_CACHE_PATH').$this->AppName.DS;
		if (!is_dir(C('DATA_RUNTIME_PATH'))) {
			mkdir(C('DATA_RUNTIME_PATH'));
			mkdir(C('DATA_CACHE_PATH'));
		}
		if (!is_dir($CachePath)) {
			mkdir($CachePath);
		}else if(!is_dir($CachePath.$this->ControllerName.DS)){
			mkdir($CachePath.$this->ControllerName.DS);
		}
		// 缓存文件路径
		$CachePath = $CachePath.$this->ControllerName.DS;
		$CacheState = defined("CACHES")?CACHES:'';
		$FileCacheObj = New \Core\Library\Driver\Cache\File(array('temp'=>$CachePath));
		// 判断是否开启页面文件缓存
		if ($CacheState==false) {
			require "$AppViewPath";
		}else{
			// 页面文件缓存实现
			$CacheKey = GetSaltString($this->AppName.$this->ControllerName.DS.$this->ActionName);
			if (is_file($FileCacheObj->filename($CacheKey.$InputDataOne))) {
				$CachePageInfo = $FileCacheObj->get($CacheKey.$InputDataOne);
				echo $CachePageInfo;
				if (empty($CachePageInfo)) {
					require "$AppViewPath";
				}
			}else{
				require "$AppViewPath";
				$BuildPageInfo = ob_get_contents();
				$FileCacheObj->set($CacheKey.$InputDataOne,$BuildPageInfo,120);
				ob_end_clean();
				echo $BuildPageInfo;
			}
		}
	}

	/**
	 * [layout 引入html公共文件]
	 * @param  string $LayoutData [文件路径]
	 * @param  string $ConnentData[要渲染的数据]
	 * @return [type]             [description]
	 * @author jzz
	 */
	public function layout($LayoutData='layout/index',$ConnentData=''){
		$SuffixData = ".html";
		if (defined("Suffix")) {
			$SuffixData = Suffix;
		}
		$LayoutData = $LayoutData.$SuffixData;
	}
}