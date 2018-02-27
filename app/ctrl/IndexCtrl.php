<?php
namespace app\ctrl;

class IndexCtrl extends CommonCtrl
{
	/*
	 *根目录的列表
	 */
	public function index(){
		$username = $_SESSION['username'];
		$userInfo = M("admin")->where(array('username'=>$username))->find();

		$system['system'] = exec("cat  /etc/redhat-release");//操作系统的类别
		$system['cpu'] = exec("cat /proc/cpuinfo | grep name | cut -f2 -d: | uniq");//CPU型号
		$system['cpuCate'] = exec("cat /proc/cpuinfo |grep 'cores'| cut -f2 -d:|uniq")."核".exec("getconf LONG_BIT")."位";//CPU参数
		$system['date'] = exec("date");//系统当前时间
		$system['runtime'] = exec("cat /proc/uptime| awk -F. '{run_days=$1 / 86400;run_hour=($1 % 86400)/3600;run_minute=($1 % 3600)/60;run_second=$1 % 60;printf(\"%d天%d时%d分%d秒\",run_days,run_hour,run_minute,run_second)}'");//系统运行时间
		$system['host'] = $_SERVER["HTTP_HOST"];
		$system['total'] = exec("free -m |grep 'Mem' | awk '{print $2}'");//总内存
		$system['used'] = exec("free -m |grep 'Mem' | awk '{print $3}'");//已经内存

		//获取当前用户的计划数量
		$cron = M("admin_cron")->where(array('adminid'=>$userInfo['id']))->select();

		$userInfo['cron'] = sizeof($cron)?sizeof($cron):0;
		$this->assign("userInfo",$userInfo);
		$this->assign("system",$system);
		$this->display();
	}

	public function show(){
		$upload = new \core\lib\upload();
		$info = $upload->upload('./app/upload/');
		if($info){
			p($upload->getUploadFileInfo());
		}else{
			p($upload->getErrorMsg());
		}
	}

	public function page(){
		$sql = "select * from frame_admin;";
		$info = M()->querysql($sql);
		p($info);
		exit;

		$count = sizeof($info);// 查询满足要求的总记录数 $map表示查询条件
    	$Page = new \core\lib\page($count,1);// 实例化分页类 传入总记录数
    	$show = $Page->show();

    	$sql2 = "select * from frame_user limit ". $Page->firstRow .",".$Page->listRows;
		$result2 = $model->query($sql2);
		$list = $result2->fetchAll();

		$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display(); // 输出模板
	}

	public function title(){
		$this->assign('data', 'hello hahahaha');
		$this->assign('number', 1);
		//$array2 = array('dk'=>'hahaha', 'xyl'=>'233333');
		$this->assign('dk',array(1,2,3));
		$this->display();
	}

	public function test(){
		$ip = $_SERVER["REMOTE_ADDR"];
		p($ip);
		exit;
	}
}