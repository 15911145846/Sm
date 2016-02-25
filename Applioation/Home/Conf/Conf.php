<?php
Class Config{
	public static $P_STATIC = array();
	public static $DEBUG = true; //开启调试模式
	public static $Execute = false;
	public static $DbConfig = array(
		'mysql'=>array(
			'DbType'=>"mysql",
			'Host' => "127.0.0.1",
			'Port' => "3306",
			'Username' => "root",
			'Password' => "123456",
			'Dbname' => "test",
			'Charset' => "utf8",
			'Prefix' =>'pt_',
			'Log' => true,
			"ATTR_PERSISTENTS" => true,
		),
		'blog'=>array(
			'DbType'=>"mysql",
			'Host' => "127.0.0.1",
			'Port' => "3306",
			'Username' => "root",
			'Password' => "123456",
			'Dbname' => "blog",
			'Charset' => "utf8",
			'Prefix' =>'pt_',
			'Log' => true,
			"ATTR_PERSISTENTS" => true,
		),
	);
}