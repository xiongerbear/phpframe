<?php
namespace core\lib\drive\log;
use core\lib\conf;

//日志存在文件系统中
class file
{
	public $path;//日志的存储位置
	//初始化的方法
	public function __construct(){
		$conf = conf::get('OPTION','log');

		$this->path = $conf['PATH'];
	}


	public function log($message,$file="log"){
		/**
		 *1.确定文件的存储位置是否存在
		 *  不存在 创建日志目录
		 *2.写入日志
		 */
		if(!is_dir($this->path.date('YmdH'))){
			mkdir($this->path.date('YmdH'),'0777',true);
		}

		$message = date("Y-m-d H:i:s").json_encode($message);

		file_put_contents($this->path.date('YmdH')."/".$file.".php",$message.PHP_EOL,FILE_APPEND);
	}
}