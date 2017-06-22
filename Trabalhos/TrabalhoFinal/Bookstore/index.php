<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-Inicio</title>
		<link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="templatemo_container">

			<!--Open Header-->
			<?php
				include 'resources/includes/header.html';
				
			?>
			<!--Close Header-->

			<div id="templatemo_content">
				
				<?php
					include 'resources/includes/leftColumn.html';
				?>

				<div id="templatemo_content_right">
					<?php
						$link = connect();

						$sql = "SELECT ISBN, title, description
							   FROM bookdescriptions
							   ORDER BY rand()
							   LIMIT 5;";

						$result = mysqli_query($link, $sql)
								or die('SQL syntax error: ' . mysqli_error($link));

						$row = mysqli_fetch_array($result);
						while ($row = mysqli_fetch_array($result)) {

							$short = substr($row['description'], 0, 80).'...';
							$authors = fListAuthors($link, $row['ISBN']);

							echo "<div class='templatemo_product_box'>
									<h1><a href='ProductPage.php?isbn=$row[ISBN]'> $row[title] </a> <span>($authors)</span></h1>
									<a href='ProductPage.php?isbn=$row[ISBN]'> <img src='resources/uploads/$row[ISBN].01.MZZZZZZZ.jpg' height='150' width='100'/> </a>
									<div class='product_info'>
										<p> $short </p>
										<div class='buy_now_button'><a href='shoppingCart.php?addISBN=$row[ISBN]'>Comprar</a></div>
                    					<div class='detail_button'><a href='ProductPage.php?isbn=$row[ISBN]'>Detalhe</a></div>
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
            
        