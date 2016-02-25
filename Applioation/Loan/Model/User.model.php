<?php 
use Core\Library\Model\BaseModel;
/**
 * 用户model
 */
Class User extends BaseModel{
	public function UserLoginCheck($UserName,$Passwd){
		if (!empty($UserName) && !empty($Passwd)) {
			$pwd = md5($Passwd);
			return $this->where(array('UserName'=>"$UserName",'PassWord'=>"$pwd"))->find('User');exit;
		}
		return array();
	}
}