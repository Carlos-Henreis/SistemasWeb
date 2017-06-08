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

				@$catID = $_GET['catID'];
				@$catName = $_GET['catName'];
				@$search = $_GET['search'];

				$link = connect();

				if(!empty($search)) {
					$sql = "SELECT DISTINCT a.ISBN, a.title, a.description, b.ISBN, b.AuthorID, c.AuthorID, c.nameF, c.nameL, d.CategoryID, e.CategoryID, e.ISBN
					 	    FROM bookdescriptions a, bookauthorsbooks b, bookauthors c, bookcategories d, bookcategoriesbooks e
					        WHERE a.ISBN = b.ISBN AND b.ISBN = e.ISBN AND d.CategoryID = e.CategoryID AND
					        	(nameF = '$search' OR nameL = '$search' OR title LIKE '%$search%' OR description LIKE '%$search%' OR publisher LIKE '%$search%')
					        ORDER BY title";
				}

				if(empty($search)) {
					$sql = "SELECT ISBN, title, description
					  		FROM bookdescriptions
					  		ORDER BY title";
				}

				if(!empty($catID)) {
					$sql = "SELECT DISTINCT a.ISBN, a.title, a.description, b.ISBN, b.AuthorID, c.AuthorID, c.nameF, c.nameL, d.CategoryID, e.CategoryID, e.ISBN
					 	    FROM bookdescriptions a, bookauthorsbooks b, bookauthors c, bookcategories d, bookcategoriesbooks e
					        WHERE a.ISBN = b.ISBN AND b.ISBN = e.ISBN AND d.CategoryID = '$catID' AND e.CategoryID = '$catID' AND b.AuthorID = c.AuthorID
					        ORDER BY title";
				}

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
						$old = 0;

						while ($row = mysqli_fetch_array($result)) {
							$short = substr($row['description'], 0, 500) . " ... <a href='ProductPage.php?isbn=$row[ISBN]'> <br> [More] </a>";
							$authors = fListAuthors($link, $row['ISBN']);

							if($old !== $row['ISBN']) {
							echo "<div class='indexBook'>
									<div class='title'> <a href='ProductPage.php?isbn=$row[ISBN]'> $row[title] </a> </div>
									<div class='author'> $authors </div>
									<div class='image'> <a href='ProductPage.php?isbn=$row[ISBN]'> <img src='https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/$row[ISBN].01.MZZZZZZZ.jpg' /> </a> </div> 
									<div class='detail'> $short </div>
								  </div>"; }

							$old = $row['ISBN'];
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