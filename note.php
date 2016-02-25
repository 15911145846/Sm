<?php
define('MysqlDebug',true);
define('AutoNewly', FALSE); 			   //是否开启自动新建应用，注意：(在线上必须修改为false)
define('ROUTECONF', FALSE);                //配置路由(开启第二种路由模式，兼容 nginx，Apache服务器下请修改为false)
define('ROOT_PATH', dirname(__FILE__));	   //项目根路径
define('Suffix','.html'); 				   //模板文件后缀
//define('GROUPS','Applioation');			   //开启分组，设置分组名称
define('CACHES',false);                    //开启缓存 1 为关闭 0为开启
define('CACHE_TS','120');                  //缓存存活时间（秒）
define('CHARSET','UTF-8'); 				   //系统编码设置
include './Core/Sm.php';				   //框架入口文件