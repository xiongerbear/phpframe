<?php
namespace app\ctrl;

class LoginCtrl extends \core\frame
{
	/**
	 * 登陆后台
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 登陆表单处理
	 */
	public function loginLand(){
		$username=post("username");
		$password=post("password");
		$db = M("admin");

		$info = $db->where(array('username'=>$username))->limit(1)->find();

		if(empty($info)){
			$this->message("<script>alert('用户名不存在!');window.location.href='".U('Login/index')."'</script>");
		}else{
			if($info['password'] == md5($password)){
				session_start();
				$_SESSION['username'] = $username;

				$data['id'] = $info['id'];
				$data['ntime'] = time();
				$data['nip'] = $_SERVER["REMOTE_ADDR"];
				$data['ltime'] = $info['ntime'];
				$data['lip'] = $info['nip'];
				$db->update($data);
				jump(U('Index/index'));
			}else{
				$this->message("<script>alert('密码错误!');window.location.href='".U('Login/index')."'</script>");
			}
		}
	}

	/**
	 * 退出登陆
	 */
	public function logout(){
		session_start();
		session_unset($_SESSION['username']);
		session_destroy();
		jump(U('Login/index'));
	}
}