<?php
	if($_COOKIE['BookCount'] == null)
		header("location: index.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> COM222 Books </title>
		<link rel="stylesheet" href="resources/styles/style.css" type="text/css"/>
		<link rel="script" href="resources/src/">
	</head>

	<body>
		<div class="content">

			<!--Open Header-->
			<?php
				include 'resources/includes/header.html';

				$link = connect();

				$email = $_POST['email'];

				$sql = "SELECT custID
				        FROM bookcustomers
				        WHERE email = '$email';";

				$result = mysqli_query($link, $sql)
						or die('Erro com o SQL: ' . mysqli_error($link));


				$row = mysqli_fetch_array($result);

				$custID = $row['custID'];

				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$street = $_POST['street'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
				$check = $_POST['check'];

				$bookArray = unserialize($_COOKIE['cart']);
				$totalbooks = $_COOKIE['BookCount'];

				if($check == "new" && $bookArray != null) {

					$sql = "INSERT INTO bookcustomers (fname, lname, email, street, city, state, zip)
					        VALUES ('$fname', '$lname', '$email', '$street', '$city', '$state', '$zip');";

					$result = mysqli_query($link, $sql)
						or die('SQL syntax error: ' . mysqli_error($link));
				}

				

				if($check == "old" && $bookArray != null) {
				
					$sql = "UPDATE bookcustomers
					        SET fname='$fname', lname='$lname', street='$street', city='$city', state='$state', zip='$zip'
					        WHERE custID = '$custID';";

					$result = mysqli_query($link, $sql) 
					    or die('SQL syntax error: ' . mysqli_error($link));
				}

				$date = time();

				$sql = "SELECT custID
						FROM bookcustomers
						WHERE email = '$email';";

				$result = mysqli_query($link, $sql) 
					    or die('SQL syntax error: ' . mysqli_error($link));

				$row = mysqli_fetch_array($result);

				$custID = $row['custID'];

				$sql = "INSERT INTO bookOrders (custID, orderDate) 
				        VALUES ($custID, $date);";

				$result = mysqli_query($link, $sql) 
					    or die('SQL syntax erro: ' . mysqli_error($link));

				$orderID = mysqli_insert_id($link);
		
			?>
			<!--Close Header-->

			<div class="bodyContainer">
				
				<?php
                  $subtotal = 0;
                  $shipping = 0;

                  echo "<div class='bookcount'> Confirmar Pedido </div>";

                  if($totalbooks > 0) {
                     $shipping = 3.49 + (0.99 * ($totalbooks - 1));

                     echo "<table>
                     		<tbody>
                           <tr>
                              <th> Título </th>
                              <th> Qtf </th>
                              <th> Preço </th>
                              <th> Total </th>
                             </tbody>
                           </tr> ";
                  }

                  $count = 1;
				  $body = "Confirmação do pedido\n\nNúmero da venda: " . $orderID . 
				             "\n\nItems enviados: \n\n";

                  if($bookArray != null) {
                  foreach ($bookArray as $key => $value) {

                     $sql = "SELECT isbn, title, Price
                             FROM bookdescriptions
                             WHERE isbn = '$key'";

                     $result = mysqli_query($link, $sql)
                        or die('erro SQL: ' . mysqli_error($link));

                     $row = mysqli_fetch_array($result);

                     $total = $row['Price'] * $value;
                     $subtotal = $subtotal + $row['Price'] * $value;

					 $body = $body . $count . " | Quantidade: " . $value . " | " . $row['title'] . "\n";
					 $count = $count + 1;
				     
                     echo "<tr><td> $row[title] </td> 
                               <td> $value </td>
                               <td> \$$row[Price] </td>
                               <td> \$$total </td></tr>";

                    $sql = "INSERT INTO bookorderitems (orderID, isbn, qty, price) 
                     		VALUES ($orderID, '$key', $value, $row[Price]);";  

					$result = mysqli_query($link, $sql)
                        or die('error SQL: ' . mysqli_error($link));        
                  }
              }

                  echo "</table>";

                  if($totalbooks > 0) {
                     $total = $subtotal + $shipping;

                     $body = $body . "\nEnvciado para:\n" . $fname . " " . $lname . "\n" . $street . "\n" . $city . " " . $state . " " . $zip . "\n\n"
              	                   . "Total das vendas: \$" . $total . "\n\n" . "Seu pedido deve chegar via PAC SEDEX dentro de uma semana.\nObrigado por comprar";

					 mail($email, "COM222 Books |Confirmação de pedido", $body, "From: com222books@gmail.com");

                     echo "<div class='taxship'> Sub-Total:  <span style='float:right'> \$$subtotal: </span><br>
                            Shipping: <span style='float:right'> \$$shipping: </span> <br>
                            <span style='font-weight:bold'> Total: <span style='float:right'> \$$total </span> </span> </div>";
                  } 
                ?>
                		<br>

                		<div class='details'> 
                			<?php
                				echo "<div class='label'> Endereço da entrega: </div>";
                				echo "<div class='value'> $fname $lname <br> $street <br> $city, $state $zip</div>";
                				echo "<div class='label'> Número de ordem: </div>";
                				echo "<div class='value'> $orderID </div>";

                				setcookie('cart', null, time()-60000);
                				setcookie('BookCount', null, time()-60000);
            			    ?>
         			   </div>

         			   <div class='footer'> Foi enviada uma confirmação para o seu endereço de e-mail. <br> Foi enviada uma confirmação para o seu endereço de e-mail. COM222 Books. <br><br>
         			   		<a href='orderHistory.php?custID=<?php echo $custID; ?>'> Ver histórico de pedidos </a>
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