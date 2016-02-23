<?php
namespace Applioation\Home\Controller;
use Core\Library\Controller\Kernel;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class UserController extends Kernel{

	public function _init(){
		//echo "构造函数";
	}

	protected function UserList(){
		return $this;
	}

	public function index(){
		//dump($this->UserList(),1);
		$allPush = 4;
		$allPush -= ($allPush % (int) 2); 
		echo $allPush;
	}

	/**
	 * [mgapp api测试]
	 * @return [type] [description]
	 * @author jzz
	 */
	public function mgapp(){
		$InputData = $this->GetInput();
		$type = !empty($this->t)?$this->t:"POST";
		if (!empty($this->actionUrl)) {
			$this->ReturnData = $this->http("$this->actionUrl","$type",$InputData,array(),FALSE);
		}
		$this->assign('InputData',$InputData);
		$this->assign('ReturnData',$this->ReturnData);
		$this->display();
	}

	/**
	 * [CRM app api测试]
	 * @return [type] [description]
	 * @author jzz
	 */
	public function crm(){
		$InputData = $this->GetInput();
		$type = !empty($this->t)?$this->t:"POST";
		if (!empty($this->actionUrl)) {
			$this->ReturnData = $this->http("$this->actionUrl","$type",$InputData,array(),FALSE);
		}
		$this->assign('InputData',$InputData);
		$this->assign('ReturnData',$this->ReturnData);
		$this->display();
	}
}

// jiazhi1434@