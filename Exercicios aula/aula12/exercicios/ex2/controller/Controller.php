<?php
include_once("model/Model.php");
include_once("model/Book.php");

class Controller {
     public $model;

     public function __construct()
     {
          $this->model = new Model("localhost", "root", "carloshenrique", "escola");
     }
	public function invoke(){
	       include 'view/inicio.php';
	}


	public function consultar() {
		include 'view/consultar.php';
	}

	public function registrar() {
		$book = new Book();
		include 'view/registra.php';
	}

	public function deletar() {
		include 'view/deletar.php';
	}

	public function atualizar() {
		include 'view/atualizar.php';
	}
}
?>
