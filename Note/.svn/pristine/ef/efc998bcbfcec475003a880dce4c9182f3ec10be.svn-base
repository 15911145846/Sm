<?php 
use Core\Library\Model\BaseModel;
/**
 * 用户model
 */
Class User extends BaseModel{
	/**
	 * [CheckUserInfo 验证用户登录]
	 * @param [type] $UserName [description]
	 * @param [type] $Userpwd  [description]
	 */
	public function CheckUserInfo($UserName,$Userpwd){
		$ReturnData = $this->where(array('user_name'=>"$UserName",'user_pw'=>"$Userpwd"))->find('user');
		return $ReturnData;
	}

	public function AddUserLoginLogs($UserId,$UserIp){
		$time = date('Y-m-d H:i:s',time());
		$ReturnData = $this->insert('log',array('u_id'=>"$UserId",'l_ip'=>"$UserIp",'addtime'=>"$time"));
		return $ReturnData;
	}
}