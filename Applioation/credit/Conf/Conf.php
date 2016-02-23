<?php
Class Config{
	public static $StaticS = array(
			'__STYLECSS__' 	=> "/Public/css/",
			'__STYLEJS__' 	=> "/Public/js/",
			'__STYLEFONT__' => "/Public/fonts/",
			'__IMG__' 		=> "/Public/img/",
			'__UEDITOR__'	=>"/Public/ueditor/",
			'__FORMYZ__'	=>"/Public/form-validator/",
	);
	public static $Execute = false; //显示框架运行情况
	public static $DEBUG = array('state' => true); //开启调试模式
	public static $DbConfig = array(
		'mysql'=>array(
			'DbType'=>"mysql",
			'Host' => "127.0.0.1",
			'Port' => "3306",
			'Username' => "root",
			'Password' => "123456",
			'Dbname' => "",
			'Charset' => "utf8",
			'Prefix' =>'pt_',
			'Log' => true,
			"ATTR_PERSISTENTS" => true,
		)
	);
}