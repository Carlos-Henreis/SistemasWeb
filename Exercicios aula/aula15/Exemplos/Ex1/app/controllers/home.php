<?php
class home extends Controller {
	public function hello() {
		$this->loadView('home_page',array('title'=>'Página Inicial','message'=>'Bem vindo teste!'));
	}

	public function login() {
		$rm = $_SERVER['REQUEST_METHOD'];
		if($rm == 'GET') {
			$this->loadView('login');
		}
		else if($rm == 'POST') {
			$usr = new user;
			echo $usr->save($_POST['uname'],$_POST['pass']);
		}
		else $this->loadView('templates/404');
	}
}