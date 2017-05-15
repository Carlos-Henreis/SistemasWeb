<?php
defined('BASEURI') or die('Acesso Negado!');
class user extends Model{
	public function save($uname,$pass) {
		$pass = hash('sha512',$pass);
		$this->loadLib('DAO/DAO');
		$db = new DAO("localhost", "root", "carloshenrique", "privado");
		$arr = array("username" => $uname, "password" => $pass);
		$db->insert("user", $arr);
		$db->execute();
		if ($db->banco->error != "")
			return $db->banco->error;
		return null;
	}
	public function login($uname,$pass) {
		$pass = hash('sha512',$pass);
		$this->loadLib('DAO/DAO');
		$db = new DAO("localhost", "root", "carloshenrique", "privado");
		$arr = array(1 =>"username= '".$uname."'", 2 => "password= '".$pass."'");
		$db->select(null, "user");
		$db->where($arr);
		$re = $db->execute();
		if ($re->num_rows == 0){
			return "User/senha não conferem";
		}
		return null;
		
	}
}