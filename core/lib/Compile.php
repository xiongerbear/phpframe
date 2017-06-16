<?php
namespace core\lib;
	/**
	* 编译
	*/
	class Compile
	{
		private $source; //待编译的文件
		private $content; //需要替换的文本
		private $compiledFile; //编译后的文件
		private $left = '{'; //左定界符
		private $right = '}'; //右定界符
		private $T_P = array(); //规则
		private $T_R = array(); //替换内容
		function __construct($template, $compiledFile, $config){
			$this->source = $template;
			$this->compiledFile = $compiledFile;
			$this->content = file_get_contents($template);
			if ($config['php_turn'] === false) {
				$this->T_P[] = "#<\? (= |php |) (.+?)\?>#is";
				$this->T_R[] = "#&lt;?\\1\\2 ?&gt;#";
			}
			$this->T_P[] = "#\{\\$([a-zA-Z_\x7f-\xff][0-9a-zA-Z_\x7f-\xff]*)\}#"; //$var
			$this->T_P[] = "#\{(foreach|loop) \\$([a-zA-Z_\x7f-\xff][0-9a-zA-Z_\x7f-\xff]*)\}#"; //foreach($array as $K=>$V){
			$this->T_P[] = "#\{(K|V)\}#"; //echo $K | echo $V
			$this->T_P[] = "#\{\/(foreach|loop)\}#"; //}
			$this->T_P[] = "#\{if (.*?)\}#"; //if($data == 1){
			$this->T_P[] = "#\{elseif (.*?)\}#"; //}elseif($data == 2){
			$this->T_P[] = "#\{else\}#"; //}else{
			$this->T_P[] = "#\{\/if\}#"; //}
			$this->T_P[] = "#\{([A-Z]*)\}#"; //}


			$this->T_R[] = "<?php echo \$\\1;?>";
			$this->T_R[] = "<?php foreach((array)\$\\2 as \$K=>\$V){ ?>";
			$this->T_R[] = "<?php echo \$\\1; ?>";
			$this->T_R[] = "<?php } ?>";
			$this->T_R[] = "<?php if(\\1){?>";
			$this->T_R[] = "<?php }elseif(\\1){?>";
			$this->T_R[] = "<?php }else{?>";
			$this->T_R[] = "<?php }?>";
			$this->T_R[] = "<?php echo \\1;?>";
		}
		public function __set($name, $value){
			$this->$name = $value;
		}
		public function __get($name){
			return $this->$name;
		}
		//编译
		public function compile(){
			$this->c_var();
			$this->c_javascript();
			file_put_contents($this->compiledFile, $this->content);
		}
		//解析定义语法
		public function c_var(){
			$this->content = preg_replace($this->T_P, $this->T_R, $this->content);
		}
		//解析javascript,并防止浏览器缓存
		public function c_javascript(){
			$this->content = preg_replace("#\{\!(.*?)\!\}#", "<script src='\\1?time=".time()."'></script>", $this->content);
		}
	}
?>