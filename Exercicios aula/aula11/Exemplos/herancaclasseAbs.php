<?php 
abstract class Model
{
	// Força a classe que estende Model a definir esses métodos
	abstract public function save();
	abstract public function load(array $atributos);
	// Método comum
	public function __construct() {
    	echo 'conectando ao banco de dados usando mysqli!<br>';
    	echo 'se não for sobrescrito o método será herdado dessa forma<br>';
	}
}

class Aluno extends Model {
	private $nome='pablo';
	private $curso='CCO';
	public function save() {
    	echo 'salvando o aluno no banco de dados<br>';
    	}
	public function load(array $atributos) {
    		echo 'Recuperando o aluno que possui as informações<br>';
    		foreach ($atributos as $key => $value) {
        		echo $key . '='.$value.'<br>';
    		}
	}
}
// Vamos testar agora nossa classe
$obj = new Aluno;
$obj->save();
$obj->load(array('nome'=>'joao', 'curso'=>'SIN'));
