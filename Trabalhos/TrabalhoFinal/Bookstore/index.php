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

				$sql = "SELECT ISBN, title, description
					   FROM bookdescriptions
					   ORDER BY rand()
					   LIMIT 5;";

				$result = mysqli_query($link, $sql)
						or die('SQL syntax error: ' . mysqli_error($link));

				$row = mysqli_fetch_array($result);
			?>
			<!--Close Header-->

			<div class="bodyContainer">
				
				<?php
					include 'resources/includes/leftColumn.html';
				?>

				<div class="right">
					<?php
						while ($row = mysqli_fetch_array($result)) {

							$short = substr($row['description'], 0, 500) . " ... <a href='ProductPage.php?isbn=$row[ISBN]'> <br> [Mais] </a>";
							$authors = fListAuthors($link, $row['ISBN']);

							echo "<div class='indexBook'>
									<div class='title'> <a href='ProductPage.php?isbn=$row[ISBN]'> $row[title] </a> </div>
									<div class='author'> $authors </div>
									<div class='image'> <a href='ProductPage.php?isbn=$row[ISBN]'> <img src='https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/$row[ISBN].01.MZZZZZZZ.jpg' /> </a> </div> 
									<div class='detail'> $short </div>
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