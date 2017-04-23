<?php
include_once ("Model.php");
include_once ("DAO/DAO.php");
class Aluno extends Model {
	private $matricula = NULL;
	private $nome = NULL;
	private $curso = NULL;
	private $DAO = NULL;

	public function __construct ($host, $usr, $pswd, $db) {
		$this->DAO = new DAO ($host, $usr, $pswd, $db);
	}

	public function save () {
		if ($this->matricula !=  NULL and $this->nome !=  NULL and $this->curso !=  NULL) {
			$arr = array("matricula" => $this->matricula, "nome" => $this->nome, "curso" => $this->curso);
			$this->DAO->insert("aluno" , $arr);
			return $this->DAO->execute();
		}
		else
			return false;
	}

	public function load ($matricula) {
		if ($matricula =='') {
			$this->DAO->select(NULL , "aluno");
			return $this->DAO->execute();
		}
		$this->DAO->select(NULL , "aluno");
		$arr = array(1 => "matricula = ".$matricula);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}


	public function delete ($matricula) {
		$this->DAO->delete("aluno");
		$arr = array(1 => "matricula = ".$matricula);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}

	public function update ($id, array $atributos) {
		$this->DAO->update("aluno", $atributos);
		$arr = array(1 => "matricula = ".$id);
		$this->DAO->where($arr);
		return $this->DAO->execute();
	}

	public function __set ($nome, $value) {
		if (property_exists(get_class($this), $nome));
			$this->$nome = $value;
	}
	
	public function __get ($nome) {
		if (property_exists(get_class($this), $nome));
			return $this->$name;
	}


}
