<?php

interface iDAO {
    // As funções a seguir são utilizadas para construir e executar uma query no mysql 
    public function select(array $attributes = NULL,$tablename);
    public function insert($tablename,array $attributes);
    public function update($tablename, array $attributes);
    public function where($conditions);
    public function execute();
}
?>
<?php 
class DAO implements iDAO {
    public $query = '';
    public function __construct($host,$user,$password,$db){
   	 echo 'Conectando ao MYSQL<br>';
    }
    public function select(array $attributes = NULL,$tablename) {
   	 if($attributes == NULL) {
   		 $this->query = 'SELECT * FROM '.$tablename;
   	 } else {
   		 $this->query = 'SELECT ';
   		 foreach ($attributes as $attribute) {
   			 $this->query.=$attribute.', ';
   		 }
   		 $this->query = rtrim($this->query,', ').' FROM '.$tablename;
   	 }
   	}
    public function insert($tablename,array $attributes) {
   	 $this->query = 'INSERT INTO '.$tablename.' ';
   	 $helper = array('(','(');
   	 foreach ($attributes as $key => $value) {
   		 $helper[0] .=$key.',';
   		 $helper[1] .="'".$value."',";
   	 }

   	 $this->query.=rtrim($helper[0],',').') VALUES '.rtrim($helper[1],',').')';
    }
    public function update($tablename, array $attributes) {
   	 $this->query = 'UPDATE '.$tablename.' SET ';
   	 foreach ($attributes as $key => $value) {
   		 $this->query.=$key."='".$value."', ";
   	 }
   	 $this->query = rtrim($this->query,', ');

    }
    public function where($conditions) {
   	 $this->query .= ' WHERE ';
   	 foreach ($conditions as $value) {
   		 $this->query.=$value.' AND ';
   	 }
   	 $this->query = rtrim($this->query,' AND ');
    }
    public function execute(){
   	 echo 'A query:<br>'.$this->query.'<br>Foi executada!<br><br>';
    }    
}

$dao = new DAO('localhost','root','mysql','escola');
$dao->select(array('nome','curso'),'aluno');
$dao->where(array("nome = 'joao'","curso='CCO'"));
$dao->execute();

$dao->select(NULL,'aluno');
$dao->where(array("nome = 'joao'","curso='CCO'"));
$dao->execute();


$dao->insert('aluno',array('nome'=>'lopes','curso'=>'CCO'));
$dao->execute();

$dao->update('aluno',array('nome'=>'bob'));
$dao->where(array("nome = 'joao'"));
$dao->execute();
?>