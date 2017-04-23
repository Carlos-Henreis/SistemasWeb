<?php
include_once("model/Book.php");

class Model {
    public function getBookList()
    {
        // aqui vão alguns registros para simular uma base de dados
        return array(
            "Jungle Book" => new Book("Jungle Book", "R. Kipling", "A classic book."),
            "Moonwalker" => new Book("Moonwalker", "J. Walker", "Walking on the moon."),
            "PHP for Dummies" => new Book("PHP for Dummies", "Algum cara esperto", "")
        );
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
