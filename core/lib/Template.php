<?php
namespace core\lib;
	/**
	* 模板引擎
	*/
	class Template
	{
		private $arrayConfig = array( //配置
				'suffix' => '.html',
				'templateDir' => 'template/',
				'compiledDir' => 'cache/',
				'cache_html' => false,
				'suffix_cache' => '.htm',
				'cache_time' => 1,
				'php_turn' => false,
				'debug' => false
			);
		public $file; //模板文件
		private $compileTool; //编译器
		static private $instance = null; //引擎实例
		private $value = array();
		public $debug = array(); //调试信息
		function __construct($arrayConfig = array()){
			$this->debug['begin'] = microtime(true);
			$this->arrayConfig = $arrayConfig + $this->arrayConfig;
			$this->getRealPath();
			if (!is_dir($this->arrayConfig['templateDir'])) {
				exit('Template dir is`not found！');
			}
			if (!is_dir($this->arrayConfig['compiledDir'])) {
				mkdir($this->arrayConfig['compiledDir'], 0770, true);
			}
			include 'Compile.php';
			// $this->compileTool = new Compile();
		}
		//处理为绝对路径
		public function getRealPath(){
			$this->arrayConfig['templateDir'] = strtr(realpath($this->arrayConfig['templateDir']), '\\', '/').'/';
			$this->arrayConfig['compiledDir'] = strtr(realpath($this->arrayConfig['compiledDir']), '\\', '/').'/';
		}
		//获取模板引擎实例
		public static function getInstance(){
			if (is_null(self::$instance)) {
				self::$instance = new Template();
			}
			return self::$instance;
		}
		//设置引擎
		public function setConfig($key, $value = null){
			if (is_array($key)) {
				$this->arrayConfig = $key + $this->arrayConfig;
			}else{
				$this->arrayConfig[$key] = $value;
			}
		}
		//获取模板引擎配置
		public function getConfig($key = null){
			if (is_null($key)) {
				return $this->arrayConfig;
			}
			return $this->arrayConfig[$key];
		}
		//注入单个变量
		public function assign($key, $value){
			$this->value[$key] = $value;
		}
		//注入数组变量
		public function assignArray($array){
			if (is_array($array)) {
				foreach ($array as $k => $v) {
					$this->value[$k] = $v;
				}
			}
		}
		//判断是否开启了缓存
		public function needCache(){
			return $this->arrayConfig['cache_html'];
		}
		//模板文件路径
		public function path(){
			return $this->arrayConfig['templateDir'].$this->file.$this->arrayConfig['suffix'];
		}
		//缓存
		public function reCache($file){
			$flag = false;
			$reCacheFile = $this->arrayConfig['compiledDir'].'/'.md5($file).$this->arrayConfig['suffix_cache'];
			if ($this->arrayConfig['cache_html'] === true) {
				$timeFlag = (time() - @filemtime($reCacheFile)) > $this->arrayConfig['cache_time'] ? false : true;
				if (is_file($reCacheFile) && filesize($reCacheFile) > 1 && $timeFlag) {
					$flag = true;
				}else{
					$flag = false;
				}
			}
			return $flag;
		}
		//展示模板
		public function show($file){
			$this->file = $file;

			if (!is_file($this->path())) {
				exit('Template dir is`not found！');
			}

			$compileFile = $this->arrayConfig['compiledDir'].md5($file).'.php';
			$cacheFile = $this->arrayConfig['compiledDir'].md5($file).'.htm';
			
			if ($this->reCache($file) === true) {
				readfile($cacheFile);
				$this->debug['cache'] = 'true';
			}else{
				$this->debug['cache'] = 'false';
				$this->compileTool = new Compile($this->path(), $compileFile, $this->arrayConfig);
				if ($this->needCache()) {
					ob_start(); //打开输出缓存
				}
				extract($this->value, EXTR_OVERWRITE);
				// var_dump($data);
				if (!is_file($compileFile) || filemtime($compileFile) < filemtime($this->path())) {
					$this->compileTool->var = $this->value;
					$this->compileTool->compile();
					include $compileFile;
				}else{
					include $compileFile;
				}
				if ($this->needCache()) {
					$message = ob_get_contents();
					file_put_contents($cacheFile, $message);
				}
			}
			$this->debug['speed'] = microtime(true) - $this->debug['begin'];
			$this->debug['count'] = count($this->value);
			$this->debug_info();
		}
		//调试信息
		public function debug_info(){
			if ($this->arrayConfig['debug'] === true) {
				echo PHP_EOL,'----------调试信息----------',PHP_EOL;
				echo '程序运行日期：',date("Y-m-d H:i:s"),PHP_EOL;
				echo '模板解析耗时：',$this->debug['speed'],PHP_EOL;
				echo '模板标签使用数量：',$this->debug['count'],PHP_EOL;
				echo '是否使用静态缓存：',$this->debug['cache'],PHP_EOL;
				echo '模板引擎实例参数：',var_dump($this->getConfig());
			}
		}
		//清理缓存
		public function clean($path = null){
			if (is_null($path)) {
				$path = glob($this->arrayConfig['compiledDir'].'*'.$this->arrayConfig['suffix_cache']);
			}else{
				$path = $this->arrayConfig['compiledDir'].md5($path).$this->arrayConfig['suffix_cache'];
			}
			foreach ((array)$path as $key => $value) {
				unlink($value);
			}
		}
	}
?>