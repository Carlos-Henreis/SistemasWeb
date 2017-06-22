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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                        <?php
                            $link = connect();

                            if(isset($_POST['editID'])){
                                $ISBN = $_POST['editID'];
                                $title = $_POST['title'];
                                $description = mysql_real_escape_string($_POST['description']);
                                $price = $_POST['price'];
                                $publisher = $_POST['publisher'];
                                $pubdate = $_POST['pubdate'];
                                $edition = $_POST['edition'];
                                $pages = $_POST['pages'];
                                $authors = $_POST['authors'];
                                @$categories = $_POST['categories'];
                                
                                $link->autocommit(FALSE);

                                $sql = "UPDATE bookdescriptions
                                    SET title='$title', description='$description', price='$price', publisher='$publisher', pubdate='$pubdate', edition='$edition', pages='$pages'
                                    WHERE ISBN='$ISBN';";

                                $link->query($sql);

                                $sql = "DELETE FROM bookauthorsbooks
                                    WHERE ISBN='$ISBN';";

                                $link->query($sql);

                                $sql = "DELETE FROM bookcategoriesbooks
                                    WHERE ISBN='$ISBN';";

                                $link->query($sql);

                                foreach($authors as $a){
                                    $sql = "INSERT INTO bookauthorsbooks (ISBN, AuthorID)
                                    VALUES ('$ISBN', '$a');";

                                    $link->query($sql);
                                }

                                foreach($categories as $c){
                                    $sql = "INSERT INTO bookcategoriesbooks (ISBN, CategoryID)
                                    VALUES ('$ISBN', '$c');";

                                    $link->query($sql);
                                }

                                $result = $link->commit();

                                if($_FILES['image']['error'] == 0){
                                    $image = $_FILES['image'];
                                    //Stores the filename as it was on the client computer.
                                    //$imagename1 = $ISBN.".01.THUMBZZZ.jpg";
                                    $imagename2 = $ISBN.".01.MZZZZZZZ.jpg";
                                    //$imagename3 = $ISBN.".01.LZZZZZZZ.jpg";
                                    //Stores the filetype e.g image/jpeg
                                    $imagetype = $_FILES['image']['type'];
                                    //Stores any error codes from the upload.
                                    $imageerror = $_FILES['image']['error'];
                                    //Stores the tempname as it is given by the host when uploaded.
                                    $imagetemp = $_FILES['image']['tmp_name'];

                                    //The path you wish to upload the image to
                                    $imagePath = "resources/uploads/";

                                    if($result){
                                        if(is_uploaded_file($imagetemp)) {
                                            if(move_uploaded_file($imagetemp, $imagePath . $imagename2)/*&& move_uploaded_file($imagetemp, $imagePath . $imagename1) && move_uploaded_file($imagetemp, $imagePath . $imagename3)*/) {
                                                echo '<div class="alertsuccess">
                                                  Livro atualizado com sucesso!
                                                </div>';
                                            }else{
                                                $link->rollback();
                                                echo '<div class="alerterror">
                                                      Livro não foi atualizado. Tente novamente!
                                                    </div>';
                                            }
                                        }else{
                                            $link->rollback();
                                            echo '<div class="alerterror">
                                                  Livro não foi atualizado. Tente novamente!
                                                </div>';
                                        }
                                    }else{
                                        $link->rollback();
                                        echo '<div class="alerterror">
                                              Livro não foi atualizado. Tente novamente!
                                            </div>';
                                    }
                                }else{
                                    if($result){ 
                                        echo '<div class="alertsuccess">
                                          Livro atualizado com sucesso!
                                        </div>';
                                    }else{
                                        $link->rollback();
                                        echo '<div class="alerterror">
                                              Livro não foi salvo. Tente novamente!
                                            </div>';
                                    }
                                }
                                
                            }

                            $ISBN = $_GET['ISBN'];

                            $sql = "SELECT ISBN, title, description, price, publisher, pubdate, edition, pages
                                   FROM bookdescriptions
                                   WHERE ISBN='$ISBN';";

                            $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $row1 = mysqli_fetch_array($result);

                            $sql = "SELECT AuthorID, nameF, nameL
                                   FROM bookauthors
                                  WHERE AuthorID IN (SELECT AuthorID FROM bookauthorsbooks WHERE ISBN = '$ISBN')
                                  ORDER BY nameF, nameL;";

                            $result2 = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $sql = "SELECT AuthorID, nameF, nameL
                                   FROM bookauthors
                                  WHERE AuthorID NOT IN (SELECT AuthorID FROM bookauthorsbooks WHERE ISBN = '$ISBN')
                                  ORDER BY nameF, nameL;";

                            $notAuthors = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $sql = "SELECT CategoryID, CategoryName
                                   FROM bookcategories
                                  WHERE CategoryID IN (SELECT CategoryID FROM bookcategoriesbooks WHERE ISBN = '$ISBN')
                                  ORDER BY CategoryName;";

                            $result3 = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $sql = "SELECT CategoryID, CategoryName
                                   FROM bookcategories
                                  WHERE CategoryID NOT IN (SELECT CategoryID FROM bookcategoriesbooks WHERE ISBN = '$ISBN')
                                  ORDER BY CategoryName;";

                            $notCategories = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                        ?>
                    <form method="post" action="book.php?ISBN=<?php echo $ISBN ?>" enctype="multipart/form-data">
                        <table class="formTable">
                             <tr>
                                <td class="label" >
                                   Título: </td>
                                <td>
                                   <input type="text" name="title" value="<?php echo $row1['title'] ?>" required placeholder="Entre com o título" minlength="2" maxlength="150" />
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Descrição: </td>
                                <td>
                                   <textarea name="description" style="height: 150px;" required  
                                          placeholder="Entre com a descrição" minlength="2"><?php echo $row1['description'];?></textarea>
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Preço: </td>
                                <td>
                                   <input type="text" name="price" value="<?php echo $row1['price'];?>" required 
                                          placeholder="Entre com o preço" pattern="[0-9]{1,4}\.[0-9]{2}" />
                                </td>
                             </tr>
                             <tr>
                                <td class="label">
                                   Editora: </td>
                                <td>
                                   <input type="text" name="publisher" value="<?php echo $row1['publisher'];?>" required 
                                          placeholder="Entre com a editora" minlength="2" maxlength="50" />
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Data de publicação: </td>
                                <td>
                                   <input id="datepicker" type="text" name="pubdate" value="<?php echo $row1['pubdate'];?>" required 
                                          placeholder="Entre com a data de publicação" maxlength="30" />
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Edição: </td>
                                <td>
                                   <input type="text" name="edition" value="<?php echo $row1['edition'];?>" required 
                                          placeholder="Entre com a edição" pattern="[0-9]{1,10}" />
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Número de páginas: </td>
                                <td>
                                   <input type="text" name="pages" value="<?php echo $row1['pages'];?>" required 
                                          placeholder="Entre com o número de páginas" pattern="[0-9]{1,10}" />
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Autores: </td>
                                <td>
                                   <select name="authors[]" size="5" multiple="multiple">
                                   <?php
                                        while ($row = mysqli_fetch_array($result2)){
                                            ?>
                                            <option value="<?php echo $row['AuthorID']; ?>" selected><?php echo $row['nameF'] . $row['nameL']; ?> </option>;
                                            <?php
                                        }
                                        while ($row = mysqli_fetch_array($notAuthors)){
                                            ?>
                                            <option value="<?php echo $row['AuthorID']; ?>"><?php echo $row['nameF'] . $row['nameL']; ?> </option>;
                                            <?php
                                        }
                                    ?>
                                  </select>
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Categorias: </td>
                                <td>
                                    <select name="categories[]" size="5" multiple="multiple">
                                    <?php
                                        while ($row = mysqli_fetch_array($result3)){
                                            ?>
                                            <option value="<?php echo $row['CategoryID']; ?>" selected><?php echo $row['CategoryName']; ?> </option>;
                                            <?php
                                        }
                                        while ($row = mysqli_fetch_array($notCategories)){
                                            ?>
                                            <option value="<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName']; ?> </option>;
                                            <?php
                                        }
                                    ?>
                                  </select>
                                </td>
                             </tr>

                             <tr>
                                <td class="label">
                                   Imagem: </td>
                                <td>
                                   <input type="file" name="image" id="image" accept="image/*">
                                </td>
                             </tr>

                             <tr>
                                <td>
                                    <input class="button" type="reset" value="Limpar"/>
                                </td>
                                <td>
                                    <input class="button" type="submit" value="Adicionar"/>
                                    <input type="hidden" name="editID" value="<?php echo $row1['ISBN']; ?>">
                                </td>
                             </tr>
                        </table>
                    </form>
                </div>
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
  $( "#datepicker" ).datepicker({
        language: "pt-BR",
        dateFormat: "MM dd, yy"
    }).datepicker('setDate', '<?php echo $row1['pubdate'];?>');

</script>