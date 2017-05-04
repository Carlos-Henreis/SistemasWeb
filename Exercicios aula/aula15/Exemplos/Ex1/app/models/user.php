<?php
class user extends Model{
	public function save($uname,$pass) {
		$pass = hash('sha512',$pass);
		// $this->loadLib('DAO');
		// $db = new DAO;
		$value='Cadastrado!';
		// unset($db);
		echo 'Olhe o que fiz com sua senha:'.$pass;
		return $value;
	}
	public function login($uname,$pass) {}
}