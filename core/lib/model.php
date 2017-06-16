<?php

namespace core\lib;
use core\lib\conf;
class model extends \PDO
{
	private $sql=array(
			"where"=>"",
			"order"=>"",
			"limit"=>"",
		);
	private $field = "*";
	private $table_name;
	private $sql_query;

	public function __construct($_tabname){
		$db = conf::all('database');
		try{
			parent::__construct($db['DSN'],$db['USERNAME'],$db['PASSWD'],array(\PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
			if($_tabname != "") $this->table_name = $db['DB_PREFIX'].$_tabname;
		}catch(\PDOException $e){
			p($e->getMessage());
		}
	}

	public function where($_where='1=1') {
		$str = "";
		if(is_array($_where)){
			foreach($_where as $key => $value){
				$str .= $key ."="."'".$value."'";
			}
		}else{
			$str = $_where;
		}
		$this->sql["where"]="WHERE ".$str;
		return $this;
	}

	public function order($_order='id DESC') {
		$this->sql["order"]="ORDER BY ".$_order;
		return $this;
	}

	public function limit($_limit='30') {
		$this->sql["limit"]="LIMIT 0,".$_limit;
		return $this;
	}

	public function field($field='*'){
		$this->field = $field;
		return $this;
	}

	public function select() {
		$this->sql_query = "SELECT ".$this->field." FROM ".$this->table_name." ".(implode(" ",$this->sql));
		return $this->querysql();
	}

	public function find() {
		$this->sql_query = "SELECT ".$this->field." FROM ".$this->table_name." ".(implode(" ",$this->sql));
		$result = $this->query($this->sql_query);
		if($result){
			$arr = $result->fetch(\PDO::FETCH_ASSOC);
			return $arr;
		}else{
			return false;
		}
	}
	/**
	 * [querysql description]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function querysql($sql=""){
		if($sql==""){
			$sql = $this->sql_query;
		}
		$result = $this->query($sql);
		if($result){
			$arr = $result->fetchAll(\PDO::FETCH_ASSOC);
			return $arr;
		}else{
			return false;
		}
	}
	/**
	 * model数据插入
	 * @param array $data 数据数组
	 * @return int $id 插入数据ID
	 */
	public function add($data=array()){
		if(empty($data) || !is_array($data)){
			return false;
		}else{
			$sql = "insert into ".$this->table_name;
			$str = $val = "";
			foreach ($data as $key => $value) {
				$str .= $key.",";
				$val .= "'".$value."'".",";
			}

			$sql .= "(".trim($str,",").") value(".trim($val,",").");";

			$result = $this->query($sql);
			$id = $this->lastInsertId();
			if($id){
				return $id;
			}else{
				return false;
			}
		}
	}
	/**
	 * [update 跟新数据]
	 * @param  array  $data [数组数据]
	 * @return int $res[影响的行数]
	 */
	public function update($data=array()){
		if(empty($data) || !is_array($data)){
			return false;
		}else{
			$sql = "update ".$this->table_name." set ";
			$str = "";
			foreach ($data as $key => $value) {
				if($key == "id"){
					$where  = "where id=".$value; 
				}else{
					$str .= $key."="."'".$value."'".",";
				}
			}

			$sql .= trim($str,",")." ".$where.";";
			$res = $this->exec($sql);
			if($res){
				return $res;
			}else{
				return false;
			}
		}
	}

}