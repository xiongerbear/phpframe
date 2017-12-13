<?php
namespace core;

class frame{

	//建立储存已经加载的类的静态变量
	static public $classMap = array();
	public $assign;
	public $template;
	public function __construct()
	{
		$config = array('php_turn' => true,'templateDir' => APP.'/views/','compiledDir' => APP.'/cache/', 'debug' => false, 'cache_html' => true);
		$this->template = new \core\lib\Template($config);
	}

	static public function run(){
		//启动日志类
		\core\lib\log::init();
		//加载路由类
		$route = new \core\lib\route;
		// var_dump(get_class_methods('\core\lib\route'));
		//p($route);
		$ctrlClass = $route->ctrl;
		$action = $route->action;



		//$ctrlfile = APP."/ctrl/".'index'."Ctrl.php";
		$ctrlfile = APP."/ctrl/".$ctrlClass."Ctrl.php";


		//$ctrlClassOk = "\\".MODULE."\ctrl\\".'index'."Ctrl";
		$ctrlClassOk = "\\".MODULE."\ctrl\\".$ctrlClass."Ctrl";
		//p($ctrlClassOk);
		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrl = new $ctrlClassOk();
			$ctrl->$action();

			//$data = "ctrl:".$ctrlClass."   "."action:".$action;
			//\core\lib\log::log($data);
		}else{
			throw new \Exception("找不到控制器！！！".$ctrlClass);
		}
	}

	//自动加载类库
	static public function load($class){
		//自动加载类库
		//new \core\route();
		//$class='\core\route'
		//PRAME.'/core/route.php';
		if(isset($classMap[$class])){
			return true;
		}else{
			$class =  str_replace("\\","/",$class);
			$file = FRAME.'/'.$class.".php";
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}



	public function assign($name,$value){
		$this->template->assign($name,$value);
	}

	public function message($str){
		echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>'.$str.'</html>';
	}

	public function display($file=""){
		if($file==""){
			$route = new \core\lib\route;
			$ctrlClass = $route->ctrl;
			$action = $route->action;
			$file = $ctrlClass."/".$action;
		}
		$filename = APP."/views/".$file.$this->template->getConfig("suffix");
		if(is_file($filename)){
			if(!empty($this->assign)){
				extract($this->assign);
			}
			$this->template->show($file);
		}else{
			$this->template->show("common/error.html");
		}
	}
	
}
