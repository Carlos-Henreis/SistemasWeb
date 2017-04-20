<?php
include_once ("Model.php");
class Aluno extends Model {
	private $matricula = NULL;
	private $nome = NULL;
	private $curso = NULL;
	private $db = NULL;

	public function __construct ($host, $usr, $pswd, $db) {
		$this->db = new mysqli ($host, $usr, $pswd, $db);
	}

	public function save () {
		if ($this->matricula !=  NULL and $this->nome !=  NULL and $this->curso !=  NULL) {
			return ($this->db->query("insert into aluno values (".$this->matricula.",'".$this->nome."','".$this->curso."')"));
		}
		else
			return false;
	}

	public function load ($matricula) {
		if ($matricula =='') {
			return $this->db->query("select * from aluno");
		}

		return $this->db->query("select * from aluno where matricula=".$matricula);
	}


	public function delete ($matricula) {
		return $this->db->query("delete from aluno where matricula=".$matricula);
	}

	public function update ($id, array $atributos) {
		return $this->db->query("UPDATE aluno SET matricula = ".$atributos["matricula"].", nome = '".$atributos["nome"]."', curso = '".$atributos["curso"]."' WHERE matricula =".$atributos["matricula"]);
	}

	public function __set ($nome, $value) {
		if (property_exists(get_class($this), $nome))
			$this->$nome = $value;
	}
	
	public function __get ($nome) {
		if (property_exists(get_class($this), $nome))
			return $this->$name;
	}


}
