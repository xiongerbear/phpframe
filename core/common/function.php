<?php

function p($var){

	if (is_bool($var)) {
		var_dump($var);
	}else if(is_null($var)){
		var_dump(NULL);
	}else{
		echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
	}
}

function M($tabname=""){
	$model = new \core\lib\model($tabname);
	return $model;
}


//接收post的方法
/*
 * @param $name 对应值
 * @param $default 默认值
 * @param $fitt 过滤方法
 */
function post($name,$default=false,$fitt=false){
	if(isset($_POST[$name])){
		if($fitt){
			switch($fitt){
				case 'int':
					if(is_numeric($_POST[$name])){
						return $_POST[$name];
					}else{
						return $default;
					}
					break;
				default:;
			}
		}else{
			return $_POST[$name];
		}
	}else{
		return $default;
	}
}

//接收get的方法
/*
 * @param $name 对应值
 * @param $default 默认值
 * @param $fitt 过滤方法
 */
function get($name,$default=false,$fitt=false){
	if(isset($_GET[$name])){
		if($fitt){
			switch($fitt){
				case 'int':
					if(is_numeric($_GET[$name])){
						return $_GET[$name];
					}else{
						return $default;
					}
					break;
				default:;
			}
		}else{
			return $_GET[$name];
		}
	}else{
		return $default;
	}
}
//跳转方法
function jump($url){
	header('Location:'.$url);
	exit();
}

//获取路劲的方法
/**
 * U方法生成路径
 * @param string $url
 * @param arr $arr
 * @return array
 */
function U($url,$arr=""){
	if($url == "") return false;
	$urlArr = explode("/",trim($url,"/"));
	$newUrl = "";
	$para = "";
	foreach ($urlArr as $value) {
		$newUrl .= $value."/";
	}
	if($arr != ""){
		
		foreach ($arr as $key =>$v) {
			$para .=$key."/".$v."/";
		}
	}
	$url = INDEX."/index.php/".trim($newUrl.$para,"/");
	return $url;
}

/**
<<<<<<< HEAD
 * 测试是否为空目录
=======
 * 
>>>>>>> start
 */
function is_empty_dir($path){    
    $H = @opendir($path); 
    $i=0;    
    while($_file=readdir($H)){    
        $i++;    
    }    
    closedir($H);    
    if($i>2){ 
        return true; 
    }else{ 
        return false;//true
    } 
}
/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path) {
	//p(is_empty_dir($path));
	if(is_dir($path) && is_empty_dir($path)){
		$handle = opendir ( $path );
		$arr=array();
		while ( ($item = readdir ( $handle )) !== false ) {
			//.和..这2个特殊目录
			if ($item != "." && $item != "..") {
				if (is_file ( $path . "/" . $item )) {
					$arr ['file'] [] = $item;
				}
				if (is_dir ( $path . "/" . $item )) {
					$arr ['dir'] [] = $item;
				}
			
			}
		}
		closedir ( $handle );
		return $arr;
	}else{
		return false;
	}	
}


/**
 * 遍历目录函数,只读取目录
 * @param string $path
 * @return array
 */
function readDirectoryDir($path,$arr=array()) {
	if(is_dir($path) && is_empty_dir($path)){
		$handle = opendir ( $path );
		while ( ($item = readdir ( $handle )) !== false ) {
			//.和..这2个特殊目录
			if ($item != "." && $item != "..") {
				if (is_dir ( $path . "/" . $item )) {
					$dir = "/".trim($path,"/") . "/" . $item;
					$arr[] = $dir;
					//session_start();
					$_SESSION['dir'] = $arr;
					readDirectoryDir($dir,$arr);
				}
			}
		}
		closedir ( $handle );
	}
}