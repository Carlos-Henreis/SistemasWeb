<html>
<head></head>
<body>
    <table>
        <tbody>
          <tr><td>Título</td><td>Autor</td><td>Descrição</td></tr>
        </tbody>
        <?php
            foreach ($books as $book)            {               
                echo '<tr><td><a href="index.php?book=' . 
                  $book->title . '">' . $book->title . '</a></td><td>' .
                  $book->author . '</td><td>' . $book->description . '</td></tr>';
            }
        ?>
    </table>
</body>
</html>
