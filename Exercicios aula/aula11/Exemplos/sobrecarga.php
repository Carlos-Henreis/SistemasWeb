<?php
class Aluno {
	private $nome = '';
	private $curso = '';
	public function __set($nome, $valor)
	{
    	echo "Acessando Método __set para o atributo <b>".$nome."</b><br>";
    	if(property_exists(get_class($this), $nome)) $this->$nome = $valor;
	}
	public function __get($nome)
	{
   	 echo 'Acessando Método __get para o atributo <b>'.$nome.'</b><br>';
    	 if(property_exists(get_class($this), $nome)) return $this->$nome;
    	 return null;
	}
	public function __isset($nome)
	{
		echo "O atributo ".$nome." está definido?<br>";
		return isset($this->$nome);
	}
	public function __unset($name) {
	   	 echo "Limpando o atributo ".$nome." <br>";
	   	 unset($this->$nome);
	}
}

$obj = new Aluno;
// Os métodos de sobrecarga serão
// invocados para acesso de atributos ou 
// variáveis private
$obj->nome = 'Maria';
echo $obj->nome.'<br>';

$obj->curso = 'CCO';
echo $obj->curso;

echo var_dump(isset($obj->nome));
unset($obj->nome);
echo var_dump(isset($obj->nome));
