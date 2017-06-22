<?php
include_once("validar.php");
$nome = $_SESSION["nome"];
?>  
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>COM222-Area restrita</title>
        <link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    </head>

    <body>
        <div id="templatemo_container">

            <!--Open Header-->
            <?php
                include 'resources/includes/header.html';
                
            ?>
            <!--Close Header-->

            <div id="templatemo_content">
                <div id="templatemo_content_left">

                    <div class="templatemo_content_left_section">
                        <h1>Buscar</h1>
                        <form action="books.php" method="GET">
                            <input class="searchField" type="text" name="search" autofocus placeholder="Buscar" /> 
                        </form>
                    </div>
        
                    <div class="templatemo_content_left_section">
                        <h1>Ações</h1>
                        <ul>
                            <li><h2><a href="authors.php"> Autores </a></h2></li>
                            <li><h2><a href="categories.php"> Categorias </a></h2></li>
                            <li><h2><a href="books.php"> Livros </a></h2></li>                
                        </ul>
                    </div>
                    
                    
                </div> <!-- end of content left -->

                <div id="templatemo_content_right">
                     <div class="templatemo_product_box">
                        <h1>Bem vindo <strong> <?php echo $nome?></strong>(<a href="sair.php">SAIR</a>)</h1>
                    </div>
                    <div class="templatemo_product_box">
                        <!--Open Header-->
                        <div class='buy_now_button'><a href='newBook.php'>Add Livro</a></div>
                    <?php

                        $link = connect();

                        if(isset($_POST['deleteID'])){
                            $ISBN = $_POST['deleteID'];
                            $sql = "DELETE FROM bookdescriptions
                               WHERE ISBN='$ISBN';";

                            $result = mysqli_query($link, $sql)
                                or die('SQL syntax error: ' . mysqli_error($link));

                            $sql = "DELETE FROM bookauthorsbooks
                                    WHERE ISBN='$ISBN';";

                                 $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $sql = "DELETE FROM bookcategoriesbooks
                                    WHERE ISBN='$ISBN';";

                                 $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));
                            if($result){
                                echo '<div class="alertsuccess">
                                      Livro deletado com sucesso!
                                    </div>';
                            }else{
                                echo '<div class="alerterror">
                                      Livro não foi deletado. Tente novamente!
                                    </div>';
                            }
                        }

                        if(isset($_GET['search'])){
                            $search = $_GET['search'];
                            $sql = "SELECT DISTINCT d.ISBN, title, description, price
                            FROM bookauthors a, bookauthorsbooks ba, bookdescriptions d,
                            bookcategoriesbooks cb, bookcategories c
                            WHERE a.AuthorID = ba.AuthorID
                            AND ba.ISBN = d.ISBN
                            AND d.ISBN = cb.ISBN
                            AND c.CategoryID = cb.CategoryID
                            AND (CategoryName LIKE '%$search%'
                            OR d.ISBN LIKE '%$search%'
                            OR title LIKE '%$search%'
                            OR description LIKE '%$search%'
                            OR publisher LIKE '%$search%' 
                            OR concat_ws(' ', nameF, nameL, nameF) LIKE '%$search%' )
                            ORDER BY title";
                        }else{
                            $sql = "SELECT ISBN, title, description
                               FROM bookdescriptions
                               ORDER BY title;";
                        }

                        $result = mysqli_query($link, $sql)
                                or die('SQL syntax error: ' . mysqli_error($link));

                        while ($row = mysqli_fetch_array($result)) {
                            $short = substr($row['description'], 0, 50).'...';
                            $authors = fListAuthors($link, $row['ISBN']);

                            echo "<div class='templatemo_product_box'>
                                    <h1><a href='ProductPage.php?isbn=$row[ISBN]'> $row[title] </a> <span>($authors)</span></h1>
                                    <a href='ProductPage.php?isbn=$row[ISBN]'> <img src='resources/uploads/$row[ISBN].01.MZZZZZZZ.jpg' height='150' width='100'/> </a>
                                    <div class='product_info'>  
                                        <p> $short </p>
                                        <div class='buy_now_button'><a href='book.php?ISBN=$row[ISBN]'>Editar</a></div>
                                        <form action='books.php' method='post'>
                                          <input name='deleteID' value='$row[ISBN]' hidden />
                                          <div class='delete_button'><button type='submit'>Deletar</button></div>
                                        </form>
                                    </div>
                                    <div class='cleaner'>&nbsp;</div>
                                </div><br>
                                <div class='cleaner_with_width'>&nbsp;</div><br>
                                  ";
                        }
                    ?>
                </div>
            </div>

            <!--Open Footer-->
            <?php
                include 'resources/includes/footer.html';
            ?>
            <!--Close Footer-->
        </div>
    </body>
</html>

<script type="text/javascript">
    $( "form" ).submit(function( event ) {
        var c = confirm("Deseja mesmo excluir este livro? Esta ação não pode ser desfeita.");
        
        if(c){
            var login = "";
            while(login == ""){
                login = prompt("Login:", "");
                if(login == null){
                    event.preventDefault();
                    return -1;
                }
            }
            var password = "";
            while(password == ""){
                password = prompt("Senha:", "");
                if(password == null){
                    event.preventDefault();
                    return -1;
                }
            }

            var l = '<?php echo $_SESSION["login"]; ?>';
            var p = '<?php echo $_SESSION["senha"]; ?>';
            if(login == l && password == p){
                return c;
            }else{
                alert("Login inválido. Tente novamente!");
               event.preventDefault(); 
            }
        }else{
            event.preventDefault();
        }
    });
</script>