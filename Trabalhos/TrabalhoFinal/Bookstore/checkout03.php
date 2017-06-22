<?php
$cookieName = "cart";
$bookArray = null;
$totalbooks = null;
if (isset($_COOKIE[$cookieName])) {
	$bookArray = unserialize($_COOKIE[$cookieName]);
	$totalbooks = $_COOKIE['BookCount'];
	setcookie($cookieName, null, time()-60000);
	setcookie('BookCount', null, time()-60000);
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-CK03</title>
		<link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="templatemo_container">

			<!--Open Header-->
			<?php
				include 'resources/includes/header.html';

			?>
			<div id="templatemo_content">
			
				
					
					<?php
					$link = connect();
					$check = $_POST['check'];
					$custID = $_POST['custID'];
					//connect to databaseConnection
					$email = $_POST['email'];
					$lname = $_POST['lname'];
					$fname = $_POST['fname'];
					$zip = $_POST['zip'];
					$state = $_POST['state'];
					$city = $_POST['city'];
					$street = $_POST['street'];
					echo "<div class=\"checkoutContainer\">";
					if ($check == 'new') {
						$sql = "INSERT INTO bookcustomers (fname, lname, email, street, city, state, zip)
					        	VALUES ('$fname', '$lname', '$email', '$street', '$city', '$state', '$zip');";

						$result = mysqli_query($link, $sql)
						or die('SQL syntax error: ' . mysqli_error($link));
						echo "<h1>Novo cliente cadastrado!</h1>";
						$title = "COM222 Books |Novo cliente";
						$body = "\nCliente Cadastrado:\n" . $fname . " " . $lname . "\n" . $street . "\n" . $city . " " . $state . " " . $zip . "\n\n";
						$title = "COM222 Books |Cleinte Cadastrado";
					}
					else {
						$sql = "UPDATE bookcustomers
					        	SET fname='$fname', lname='$lname', street='$street', city='$city', state='$state', zip='$zip'
					        	WHERE custID = '$custID';";

						$result = mysqli_query($link, $sql) 
					    or die('SQL syntax error: ' . mysqli_error($link));
						echo "<h1>Seus dados foram atualizados!</h1>";
						$title = "COM222 Books |Dados atualizados";
						$body = "\nDados atualizados:\n" . $fname . " " . $lname . "\n" . $street . "\n" . $city . " " . $state . " " . $zip . "\n\n";
						$title = "COM222 Books | Dados Atualizados";
					}
					echo "<div class='details'> ";
            	
    				echo "<div class='label'>  Seus dados: </div>";
    				echo "<div class='value'> $fname $lname - $street $city, $state $zip</div><div class='value'></div></div></div>
    					<hr align=\"center\" width=\"90%\" size=\"1\" color=white>";

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

						<div id="templatemo_content">
						
							<div class="checkoutContainer">
							
								<?php
								$subtotal = 0;
	                  			$shipping = 0;

								if($totalbooks > 0) {
									echo "<div class='bookcount'> Confirmar Pedido </div>";
									$shipping = 10 + (5 * ($totalbooks - 1));

			                    	echo "<table>
											<tbody>
											<tr>
												<th> Título </th>
												<th> Qtf </th>
												<th> Preço </th>
												<th> Total </th>
											</tbody>
											</tr> ";
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
										$total = $subtotal + $shipping;

	                     			$body = $body . "\nEnvciado para:\n" . $fname . " " . $lname . "\n" . $street . "\n" . $city . " " . $state . " " . $zip . "\n\n"
		              	                   . "Total das vendas: \$" . $total . "\n\n" . "Seu pedido deve chegar via PAC SEDEX dentro de uma semana.\nObrigado por comprar";
              	                   	$title = "COM222 Books |Confirmação de pedido";
							 		
									echo "<div class='taxship'> Sub-Total:  <span style='float:right'> \$$subtotal: </span><br>
			                            Shipping: <span style='float:right'> \$$shipping: </span> <br>
			                            <span style='font-weight:bold'> Total: <span style='float:right'> \$$total </span> </span> </div>";
               					?>
               					<div class='details'>
               					<?php
	                				echo "<div class='label'> Endereço da entrega: </div>";
	                				echo "<div class='value'> $fname $lname - $street $city, $state $zip</div><div class='value'></div>";
	                				echo "<div class='label'> Número de ordem: </div>";
	                				echo "<div class='value'> $orderID </div>";

	                				setcookie('cart', null, time()-60000);
	                				setcookie('BookCount', null, time()-60000);
	                				echo"<br>
				         			   </div>

				         			   <div class='footer'>Foi enviada uma confirmação para o seu endereço de e-mail. COM222 Books. <br><br>
				         			   		<a href='orderHistory.php?custID=".$custID."'> Ver histórico de pedidos </a>
				         			   </div>";
	                			}
		                  		mail($email, $title, $body, "From: com222books@gmail.com");
	            			    
	            			    ?>

        			    </div>
            <!--Open Footer-->
                <?php
                    include 'resources/includes/footer.html';
                ?>
                <!--Close Footer-->
            </div>
        </div>
    </body>
</html>

