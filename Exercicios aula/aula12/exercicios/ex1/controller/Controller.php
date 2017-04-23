<?php
include_once("model/Model.php");

class Controller {
     public $model;

     public function __construct()
     {
          $this->model = new Model();
     }
 public function invoke()
{
	  if (!isset($_GET['book']))
	  {
	     // nenhum livro foi requisitado, 
					// mostrar lista de todos os livros disponíveis
	       $books = $this->model->getBookList();
	       include 'view/booklist.php';
	  }
	  else
	  {
	       // mostra o livro requisitado
	       $book = $this->model->getBook($_GET['book']);
	       include 'view/viewbook.php';
	  }
     }
}
?>
