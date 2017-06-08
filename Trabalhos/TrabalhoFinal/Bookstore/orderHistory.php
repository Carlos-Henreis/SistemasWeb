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

				$custID = $_GET['custID'];

				$link = connect();
			?>
			<!--Close Header-->

			<div class="bodyContainer">
				
				<?php
					include 'resources/includes/leftColumn.html';
				?>

				<div class="right">
						<div class="orderHistory"> Histórico de pedido </div>

					<?php

						$sql = "SELECT DISTINCT a.orderID, a.orderDate, a.custID, b.orderID, b.ISBN, b.qty, c.ISBN, c.title, d.AuthorID, d.nameF, d.nameL, e.ISBN, e.AuthorID
								FROM bookOrders a, bookOrderItems b, bookdescriptions c, bookauthors d, bookauthorsbooks e
								WHERE a.orderID = b.orderID AND a.custID = '$custID' AND b.ISBN = e.ISBN AND c.ISBN = b.ISBN AND c.ISBN = e.ISBN AND d.AuthorID = e.AuthorID;";

								$result = mysqli_query($link, $sql)
								or die('SQL syntax error: ' . mysqli_error($link));

								$numBooks = mysqli_num_rows($result);

								while ($row = mysqli_fetch_array($result)) {

									$date = date("F j, Y", $row['orderDate']);
									
									echo "<div class='historyIndex'>

											<div class='image'> <a href='ProductPage.php?isbn=$row[ISBN]'> <img src='https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/$row[ISBN].01.MZZZZZZZ.jpg' /> </a> </div>
										<div class='rightCol'>
											<div class='order'> ID do pedido: $row[orderID] </div>
											<div class='date'> $date </div>
											<div class='title'> $row[title] </div>
											<div class='author'>$row[nameF] $row[nameL]</div>
											<div class='qty'> Qty: $row[qty] </div>
										</div>
										  </div>";

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