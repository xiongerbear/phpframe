<?php
/**
*入口文件
*1.定义常量
*2.加载函数库
*3.启动框架
*/
//define('FRAME',dirname(__FILE__));//linux 下适用
define('FRAME',str_replace('\\','/',dirname(realpath(__FILE__))));//window下适用
define('CORE','./core');
define('APP','./app');
// define('PUBLICPATH','http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,strrpos($_SERVER['SCRIPT_NAME'],'/')).'/app');
// define('INDEX','http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,strrpos($_SERVER['SCRIPT_NAME'],'/')));
define('MODULE','app');
define('DEBUG',true);
//var_dump(str_replace('\\','/',dirname(realpath(__FILE__))));
//exit;
if(DEBUG){
	ini_set('display_errors','On');
}else{
	ini_set('display_errors','Off');
}

include CORE.'/common/function.php';
include CORE.'/frame.php';

spl_autoload_register('\core\frame::load');

\core\frame::run();
