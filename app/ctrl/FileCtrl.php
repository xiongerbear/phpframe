<?php
namespace app\ctrl;
class FileCtrl extends CommonCtrl
{
	/**
	 * 根目录的文件操作
	 * @return array 文档数组
	 */
	public function index(){
		$path = get("path");
		$deep = get("deep");

		if($path == false){
			$filepath = "/";
		}else{
			if($deep == false){
				$filepath = "/".$path;
				$deeppath = $path;
			}else{
				$deeparr = explode("-",$deep);
				foreach($deeparr as $value){
					$str .= $value."/";
				}
				$filepath = "/".$str.$path;
				$deeppath = $deep."-".$path;
			}
		}
		$fileInfo = readDirectory($filepath);

		if(!empty($fileInfo['file'])){
			$files = $fileInfo['file'];
			$this->assign("files",$files);
		}
		if(!empty($fileInfo['dir'])){
			$dir = $fileInfo['dir'];
			$this->assign("dir",$dir);
		}
		$this->assign("deep",$deeppath);
		$this->display();
	}
	/**
	 * shell目录的文件操作
	 * @return array 文档数组
	 */
	public function shell(){
		$path = get("path");
		$deep = get("deep");

		if($path == false){
			$filepath = FRAME."/shell";
		}else{
			if($deep == false){
				$filepath = FRAME."/shell/".$path;
				$deeppath = $path;
			}else{
				$deeparr = explode("-",$deep);
				foreach($deeparr as $value){
					$str .= $value."/";
				}
				$filepath = FRAME."/shell/".$str.$path;
				$deeppath = $deep."-".$path;
			}
		}
		$fileInfo = readDirectory($filepath);

		if(!empty($fileInfo['file'])){
			$files = $fileInfo['file'];
			$this->assign("files",$files);
		}
		if(!empty($fileInfo['dir'])){
			$dir = $fileInfo['dir'];
			$this->assign("dir",$dir);
		}
		$this->assign("deep",$deeppath);
		$this->display();
	}
	/**
	 * 演示目录的文件操作
	 * @return array 文档数组
	 */
	public function file(){
		$path = get("path");
		$deep = get("deep");

		if($path == false){
			$filepath = FRAME."/file";
			$deeppath = "";
			$backurl = U('File/file');
		}else{
			if($deep == false){
				$filepath = FRAME."/file/".$path;
				$deeppath = $path;
				$backurl = U('File/file');
			}else{
				$str = "";
				$deeparr = explode("-",$deep);

				//上一级目录url
				$backpath = end($deeparr);
				$backdeep = "";

				foreach($deeparr as $value){
					$str .= $value."/";
					if($value!=$backpath){
						$backdeep .= $value."-";
					}
				}
				$filepath = FRAME."/file/".$str.$path;
				$deeppath = $deep."-".$path;

				$backurl = U('File/file',array('path'=>$backpath,'deep'=>trim($backdeep,"-")));
			}
		}
		$fileInfo = readDirectory($filepath);

		if(!empty($fileInfo['file'])){
			$files = $fileInfo['file'];
			$this->assign("files",$files);
		}
		if(!empty($fileInfo['dir'])){
			$dir = $fileInfo['dir'];
			$this->assign("dir",$dir);
		}

		$this->assign("dirpath",$filepath."/");
		$this->assign("backurl",$backurl);
		$this->assign("deep",$deeppath);
		$this->display();
	}

	/**
	 * [createNew 创建新文件或者目录]
	 * @return [json] [返回json数据]
	 */
	public function createNew(){
		$type = post("type");
		$name = post("name");
		$dirpath = post("dirpath");

		if($type!=false && $name!=false && $dirpath!=false){

			if($type=="1"){
				$dir = $dirpath."/".$name;
				exec("mkdir ".$dir);
				if(exec("echo $?") == 0){
					$data['state'] = 200;
					$data['msg'] = "创建文件夹成功";
					echo json_encode($data);
				}else{
					$data['state'] = 0;
					$data['msg'] = "创建文件夹失败";
					echo json_encode($data);
				}
			}else{
				$file = $dirpath."/".$name;
				if(file_exists($file)){
					$data['state'] = 0;
					$data['msg'] = "文件已存在";
					echo json_encode($data);
				}else{
					exec("touch ".$file);
					if(exec("echo $?") == 0){
						$data['state'] = 200;
						$data['msg'] = "创建文件成功";
						echo json_encode($data);
					}else{
						$data['state'] = 0;
						$data['msg'] = "创建文件失败";
						echo json_encode($data);
					}
				}
			}
		}else{
			$data['state'] = 0;
			$data['msg'] = "ERROR";
			echo json_encode($data);
		}
	}



	//异步上传文件
	public function uploadFile(){
		$dirpath = $_POST['dirpath'];
		$file = $_FILES['files'];

		$config['uploadReplace'] = true;
		$config['saveRule'] = "";
		$upload = new \core\lib\upload($config);

		$info = $upload->uploadOne($file,iconv("gbk","utf-8",$dirpath));

		if($info){
			$data['msg'] = "上传成功！";
			$data['state'] = 200;
			echo json_encode($data,true);
		}else{
			$data['msg'] = $upload->getErrorMsg();
			$data['state'] = 0;
			echo json_encode($data,true);
		}
	}

	/**
	 * [delDirFile 删除文件夹或者目录]
	 * @return [type] [description]
	 */
	public function delDirFile(){
		$dirpath = post('dirpath');
		$name = post('name');

		exec("rm -rf ".$dirpath.$name);
		if(exec("echo $?") == 0){
			$data['state'] = 200;
			$data['msg'] = "删除成功";
			echo json_encode($data);
		}else{
			$data['state'] = 0;
			$data['msg'] = "删除失败";
			echo json_encode($data);
		}
	}

	/**
	 * [renameDirFile 重命名文件夹或者目录]
	 * @return [type] [description]
	 */
	public function renameDirFile(){
		$dirpath = post('dirpath');
		$name = post('name');
		$oldname = post('oldname');

		exec("mv ".$dirpath.$oldname." ".$dirpath.$name);
		if(exec("echo $?") == 0){
			$data['state'] = 200;
			$data['msg'] = "重命名成功";
			echo json_encode($data);
		}else{
			$data['state'] = 0;
			$data['msg'] = "重命名失败";
			echo json_encode($data);
		}
	}

	/**
	 * [readAllDir 读取所有的下级目录]
	 * @return [type] [description]
	 */
	public function readAllDir(){
		readDirectoryDir(FRAME."/file/");
		$dir = $_SESSION['dir'];
		if(empty($dir)){
			$data['state'] = 0;
			$data['msg'] = "没有可移动目录";
			echo json_encode($data);
		}else{
			$data['state'] = 200;
			$data['dir'] = $dir;
			echo json_encode($data);
		}
	}

	public function moveDirFile(){
		$dirpath = post('dirpath');
		$olddirfile = post('olddirfile');
		$selectname = post('selectname');
		$type = post('type');

		if($type==1){
			exec("mv ".$dirpath.$olddirfile." ".$selectname);
			if(exec("echo $?") == 0){
				$data['state'] = 200;
				$data['msg'] = "移动成功";
				echo json_encode($data);
			}else{
				$data['state'] = 0;
				$data['msg'] = "移动失败";
				echo json_encode($data);
			}
		}else{
			exec("cp -r ".$dirpath.$olddirfile." ".$selectname);
			if(exec("echo $?") == 0){
				$data['state'] = 200;
				$data['msg'] = "复制成功";
				echo json_encode($data);
			}else{
				$data['state'] = 0;
				$data['msg'] = "复制失败";
				echo json_encode($data);
			}
		}
	}
}