<?php
include_once("model/Book.php");

class Model {

    public function getBookList(){
        $banco = new mysqli ('localhost', 'root', 'carloshenrique', 'escola');
        $resultado = $banco->query("select * from livro");
        $lista;
        while ($row = $resultado->fetch_assoc()) {
            $lista[$row["titulo"]] = new Book($row["titulo"], $row["autor"], $row["descricao"]);
        } 
        return $lista; 
        // aqui vão alguns registros para simular uma base de dados
    }
    public function getBook($title)
    {
        // Usamos a função acima para obter todos os livros 
        // e então retornamos o livro requisitado.
        // Numa aplicação real isso seria feito 
        // por meio de um select no banco de dados
        $allBooks = $this->getBookList();
        return $allBooks[$title];
    }
}
?>
