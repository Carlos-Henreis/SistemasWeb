<?php
interface iDAO {
    // As funções a seguir são utilizadas para construir e executar uma query no mysql 
    public function select(array $attributes = NULL,$tablename);
    public function insert($tablename,array $attributes);
    public function update($tablename, array $attributes);
    public function delete($tablename);
    public function where($conditions);
    public function execute();
}
?>