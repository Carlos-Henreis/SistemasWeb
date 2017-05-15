<?php
defined('BASEURI') or die('Acesso Negado!');
include_once ("app/lib/DAO/Interface/iDAO.php");
class DAO implements iDAO {
  public $query = '';
  public $banco;
  public function __construct($host,$user,$password,$db){
    $this->banco = new mysqli($host, $user, $password, $db);
  }
  public function select(array $attributes = NULL,$tablename) {
    if($attributes == NULL) {
      $this->query = 'SELECT * FROM '.$tablename;
    } 
    else {
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


  public function delete ($tablename) {
    $this->query = 'DELETE FROM '.$tablename;
  }


  public function where($conditions) {
    $this->query .= ' WHERE ';
    foreach ($conditions as $value) {
      $this->query.=$value.' AND ';
    }
    $this->query = rtrim($this->query,' AND ');
  }

  public function execute(){
    return $this->banco->query($this->query);
  }    
}