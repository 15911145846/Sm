<?php
Class Config{
	public static $Execute = true; //显示框架运行情况
	public static $DEBUG = true; //开启调试模式
	public static $StaticS = array(
			'__STYLECSS__' 	=> "/Public/Loan/css/",
			'__STYLEJS__' 	=> "/Public/Loan/js/",
			'__STYLEFONT__' => "/Public/Loan/fonts/",
			'__IMG__' 		=> "/Public/Loan/img/",
			'__UEDITOR__'	=>"/Public/Loan/ueditor/",
	);
	public static $DbConfig = array(
		'mysql'=>array(
			'DbType'=>"mysql",
			'Host' => "127.0.0.1",
			'Port' => "3306",
			'Username' => "root",
			'Password' => "123456",
			'Dbname' => "loan",
			'Charset' => "utf8",
			'Prefix' =>'lo_',
			'Log' => true,
			"ATTR_PERSISTENTS" => true,
		)
	);
}