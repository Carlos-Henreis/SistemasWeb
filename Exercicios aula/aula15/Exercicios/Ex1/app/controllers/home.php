<?php
defined('BASEURI') or die('Acesso Negado!');
class home extends Controller {
	public function hello() {
		$this->loadView('home_page',array('title'=>'Página Inicial','message'=>'Bem vindo!'));
	}

	public function signup() {
		$rm = $_SERVER['REQUEST_METHOD'];
		if($rm == 'GET') {
			$this->loadView('save');
		}
		
		else if($rm == 'POST') {
			$usr = new user;
			$ret = $usr->save($_POST['uname'],$_POST['pass']);
			if ($ret == null)
				$this->loadView('cadastrado');
			else {
				$ar = array('erro' => $ret);
				$this->loadView('error', $ar);
			}
		}
		else $this->loadView('templates/404');
	}

	public function signin() {
		$rm = $_SERVER['REQUEST_METHOD'];
		if($rm == 'GET') {
			$this->loadView('login');
		}
		else if($rm == 'POST') {
			$usr = new user;
			$ret = $usr->login($_POST['uname'],$_POST['pass']);
			if ($ret == null) {
				$this->loadView('logado');
			}
			else
				$arr = array('erro' =>$ret);
				$this->loadView('error', $arr);
		}
		else $this->loadView('templates/404');
	}
}