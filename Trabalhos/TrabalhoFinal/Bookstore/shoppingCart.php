
<!DOCTYPE HTML>
<html>
   <head>
      <meta http-equiv="Content-Language" content="pt-br">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>COM222-Carrinho</title>
      <link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
   </head>


   <body>
      <div id="templatemo_container">

         <!--Open Header-->
         <?php
         include 'resources/includes/header.html';

         $link = connect();

         //Shopping cart uses cookies to store cart items.
         //PHP script uses an array for adding, removing and displaying the cart items.
         //Cookies can contain only string data so array must be serialized.
         $totalbooks = null;
         $bookArray = null;
         $cookieName = "cart";
         // retrieve cookie and unserialize into $bookArray
         if (isset($_COOKIE[$cookieName])) {
            $bookArray = unserialize($_COOKIE[$cookieName]);
         }
         // Add items to cart
         @$addISBN = $_GET['addISBN'];
         if (strlen($addISBN) > 0) {
            if (isset($addISBN, $bookArray)) {
               // Increment by +1
               @$bookArray[$addISBN] += 1;
            } else {
               // Add new item to cart
               $bookArray[$addISBN] = 1;
            }
         }
         // Remove items from cart
         @$deleteISBN = $_GET['deleteISBN'];
         if (strlen($deleteISBN) > 0) {
            if (isset($bookArray[$deleteISBN])) {
               // Deincrement by 1
               $bookArray[$deleteISBN] -= 1;
               // remove ISBN from array if qty==0
               if ($bookArray[$deleteISBN] == 0) {
                  unset($bookArray[$deleteISBN]);
               }
            }
         }
         if (isset($bookArray)) {
            // Write cookie
            setcookie($cookieName, serialize($bookArray), time() + 60 * 60 * 24 * 180);

            //Count total books in cart
            $totalbooks = 0;
            foreach ($bookArray as $isbn => $qty) {
               $totalbooks += $qty;
            }
            setCookie('BookCount', $totalbooks, time() + 60 * 60 * 24 * 180);
         }

         ?>
         <!--Close Header-->

         <div id="templatemo_content">
            
            <?php
               include 'resources/includes/leftColumn.html';
            ?>

            <div id="templatemo_content_right">

               <?php
                  $subtotal = 0;
                  $shipping = 0;
                  if($totalbooks == null)
                     $totalbooks = 0;

                  echo "<div class='bookcount'> " . $totalbooks; 

                  if($totalbooks == 1) 
                     echo " Item em seu carrinho.</div>";
                  else
                     echo " items em seus carrinhos.</div>";

                  if($totalbooks > 0) {
                     $shipping = 10 + (5 * ($totalbooks - 1));

                     echo "<table>
                           <tr>
                              <th> Titulo </th>
                              <th> Qtd </th>
                              <th> Venda </th>
                              <th> Total </th>
                              <th> </th>
                           </tr> ";
                  }
                  
                  // You're going to hate yourself for this.
                  
                  if($bookArray != null) {
                  foreach ($bookArray as $key => $value) {

                     $sql = "SELECT isbn, title, Price
                             FROM bookdescriptions
                             WHERE isbn = '$key'";

                     $result = mysqli_query($link, $sql)
                        or die('SQL syntax error: ' . mysqli_error($link));

                     $row = mysqli_fetch_array($result);

                     $total = $row['Price'] * $value;
                     $subtotal = $subtotal + $row['Price'] * $value;

                     echo "<tr><td> $row[title] </td> 
                               <td> $value </td>
                               <td> \$$row[Price] </td>
                               <td> \$$total </td>
                               <td> <a href='shoppingCart.php?addISBN=$key'> Adicionar </a> <br> <a href='shoppingCart.php?deleteISBN=$key'> Remove </a></td></tr>";
                  }
               }
  
                  echo "</table>";

                  if($totalbooks > 0) {
                     $total = $subtotal + $shipping;

                     echo "<div class='taxship'> Sub-Total:  <span style='float:right'> \$$subtotal </span><br>
                            Frete:* <span style='float:right'> \$$shipping </span> <br>
                            <span style='font-weight:bold'> Total: <span style='float:right'> \$$total </span> </span> </div>";
                  } 

               ?>

               <div class ="cartFooter"> 

                  <div class="checkout"> 
                     <a href="index.php"> Continuar Compras </a>
                     <a href="checkout01.php"> Finalizar compras </a> 
                  </div>
                  <p> * O frete é de R$ 10,0 para o primeiro livro e US $ 5,0 para cada livro adicional. Para garantir uma entrega confiável e para manter seus custos baixos, enviamos todos os livros via PAC. 
                  </p>

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