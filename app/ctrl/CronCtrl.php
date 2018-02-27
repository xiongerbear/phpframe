<?php
namespace app\ctrl;
/**
 * 定是任务模块
 */
class CronCtrl extends CommonCtrl
{
	/**
	 * [index 系统提供的所有计划任务]
	 * @return [type] [description]
	 */
	public function index(){
		$cron = M("cron");
		$info =$cron->select();

		$this->assign("cron",$info);
		$this->display();
	}
	/**
	 * [addCron 添加系统计划任务到我的任务库]
	 */
	public function addCron(){
		$cron = M("cron");
		$info =$cron->select();

		$this->assign("cron",$info);
		$this->display();
	}
	/**
	 * [addTimeCron 添加定时任务表单处理]
	 */
	public function addTimeCron(){
		$username=$_SESSION['username'];
		$uinfo = M("admin")->where(array('username'=>$username))->find();
		$cronid = post("cronid");
		$type = post("type");
		$tian = post("tian");
		$hour = post("hour");

		if($type==1){
			$data['timedetail'] = "每月".$tian."日"."-".$hour."点执行";
			$data['exetime'] = "00 ".$hour." ".$tian." * "."*";
			$data['adminid'] = $uinfo['id'];
			$data['cronid'] = $cronid;
			$data['state'] = 0;
		}else{
			$data['timedetail'] = "每周".$tian."-".$hour."点执行";
			$data['exetime'] = "00 ".$hour." *"." * ".$tian;
			$data['adminid'] = $uinfo['id'];
			$data['cronid'] = $cronid;
			$data['state'] = 0;
		}
		if(M("admin_cron")->add($data)){
			$this->message("<script>alert('添加定时任务成功!');window.location.href='".U('Cron/myCron')."'</script>");
		}else{
			$this->message("<script>alert('添加定时任务失败!');window.location.href='".U('Cron/addCron')."'</script>");
		}
	}
	/**
	 * [myCron 用户的计划任务]
	 * @return [type] [description]
	 */
	public function myCron(){
		$username=$_SESSION['username'];
		$uinfo = M("admin")->where(array('username'=>$username))->find();

		$sql = "select ac.id,ac.exetime,ac.timedetail,ac.state,cron.title,cron.cron from frame_admin_cron as `ac` join frame_cron as `cron` on cron.id=ac.cronid where ac.adminid=".$uinfo['id'];
		$cron = M()->querysql($sql);

		$this->assign("cron",$cron);
		$this->display();
	}

	/**
	 * [exeCron 用户的计划任务]
	 * @return [type] [description]
	 */
	public function exeCron(){

		$sql = "select ac.id,ac.exetime,ac.timedetail,ac.state,cron.title,cron.cron,admin.username from frame_admin_cron as `ac` join frame_cron as `cron` on cron.id=ac.cronid join frame_admin as `admin` on admin.id=ac.adminid where ac.state=1";
		$cron = M()->querysql($sql);

		$this->assign("cron",$cron);
		$this->display();
	}
}