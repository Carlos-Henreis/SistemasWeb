<?php
include_once("model/Book.php");
include_once("model/DAO/DAO.php");

class Model {

	private $DAO = NULL;

	public function __construct ($host, $usr, $pswd, $db) {
		$this->DAO = new DAO ($host, $usr, $pswd, $db);
	}

	public function save ($book) {
		if ($book->codigo !=  NULL and $book->titulo !=  NULL and $book->autor !=  NULL and $book->descricao !=  NULL) {
			$arr = array("codigo" => $book->codigo, "titulo" => $book->titulo, "autor" => $book->autor, "descricao" => $book->descricao);
			$this->DAO->insert("livro" , $arr);
			return $this->DAO->execute();
		}
		else
			return false;
	}

	public function load ($titulo) {
		if ($titulo =='') {
			$this->DAO->select(NULL , "livro");
			return $this->DAO->execute();
		}
		$this->DAO->select(NULL , "livro");
		$arr = array(1 => "titulo = \"$titulo\"");
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}

	public function load1 ($titulo) {
		$this->DAO->select(NULL , "livro");
		$arr = array(1 => "codigo = ".$titulo);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}

	public function delete ($codigo) {
		$this->DAO->delete("livro");
		$arr = array(1 => "codigo = ".$codigo);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}

	public function update ($id, array $atributos) {
		$this->DAO->update("livro", $atributos);
		$arr = array(1 => "codigo = ".$id);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}
}
?>