<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-Produto</title>
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
					<div class="productPage">

					<?php
						$isbn = $_GET["isbn"];

						$link = connect();

						$sql = "SELECT a.ISBN, a.title, a.description, a.price, a.publisher, a.pubdate, a.edition, a.pages, b.ISBN, b.AuthorID, c.AuthorID, c.nameF, c.nameL
							   FROM bookdescriptions a, bookauthorsbooks b, bookauthors c
							   WHERE a.ISBN = '$isbn' AND a.ISBN = b.ISBN AND b.AuthorID = c.AuthorID";

						$result = mysqli_query($link, $sql)
								or die('SQL syntax error: ' . mysqli_error($link));

						$row = mysqli_fetch_array($result);

							$authors = fListAuthors($link, $isbn);

							echo " <div class='title'> $row[title] </div> 
								   <div class='author'>	$authors </div>
								   
								   <div class='image'> <img src='resources/uploads/$row[ISBN].01.MZZZZZZZ.jpg' /> </div>

								   <div class='detail'>
								   		<div class='price'> \$$row[price] USD </div>
								   		<div class='specific'>
								   			<span style='font-weight: bolder'>      ISBN: </span> $row[ISBN] <br>
								   			<span style='font-weight: bolder'> Editora: </span> $row[publisher] <br>
								   			<span style='font-weight: bolder'>     Paginas: </span> $row[pages] <br>
								   			<span style='font-weight: bolder'>   Edição: </span> $row[edition] <br>
								   			<div class='addtocart'> <a href='shoppingCart.php?addISBN=$row[ISBN]'> <img src='resources/images/addCart.gif'/> </a></div>
								   		</div>
								   </div>

								   <div class='desc'> $row[description] </div>
								   		"; /*
									$row[price]
									$row[publisher]
									$row[pubdate]
									$row[edition]
									$row[pages]
							"; */
					?>

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