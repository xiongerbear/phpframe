<?php
namespace app\ctrl;
/**
 * 软件监控任务模块
 */
class MonitorCtrl extends CommonCtrl
{
	/**
	 * 首页-MySql监控信息
	 */
	public function index(){
		$this->display();
	}

	/**
	 * linux系统内存基本信息显示
	 */
	public function system(){
		exec("sh ".FRAME."/shell/monitor/free_mem.sh");
		$load = exec("sh ".FRAME."/shell/monitor/check_load.sh");
		$content = exec("cat ".FRAME."/shell/tmp/freemem.txt");
		exec("cat ".FRAME."/shell/tmp/freemem.txt",$res);
	
		$this->assign("content",$content);
		$this->assign("res",$res);
		$this->assign("load",$load);
		$this->display();
	}
}