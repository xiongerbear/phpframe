<?php
namespace app\ctrl;

class CommonCtrl extends \core\frame
{
	/**
	 * 判断是否登录过
	 */
	public function __construct(){
		session_start();
		parent::__construct();
		if(!(isset($_SESSION['username']) && $_SESSION['username']!="")){
			jump(U('Login/index'));
		}
	}
}