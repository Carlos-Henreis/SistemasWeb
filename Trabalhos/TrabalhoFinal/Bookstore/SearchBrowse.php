<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-Busca</title>
		<link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
	</head>


	<body>
		<div id="templatemo_container">

			<!--Open Header-->
			<?php
			include 'resources/includes/header.html';


			$link = connect();

			?>
			<div id="templatemo_content">
				
			<?php
				include 'resources/includes/leftColumn.html';
			?>

			<div id="templatemo_content_right">
			<?php
				      //List records
			@$catName = $_GET['catName']; 
			@$search = $_GET['search']; 
			if (!empty($catName)){
			   $search = $catName;
			}
  
			$sql = "SELECT DISTINCT d.isbn, title, description, price
			    FROM bookauthors a, bookauthorsbooks ba, bookdescriptions d,
			    bookcategoriesbooks cb, bookcategories c
			    WHERE a.AuthorID = ba.AuthorID
			    AND ba.ISBN = d.ISBN
			    AND d.ISBN = cb.ISBN
			    AND c.CategoryID = cb.CategoryID
			    AND (CategoryName = '$search'
			    OR title LIKE '%$search%'
			    OR description LIKE '%$search%'
			    OR publisher LIKE '%$search%' 
			    OR concat_ws(' ', nameF, nameL, nameF) LIKE '%$search%' )
			    ORDER BY title";
			  
			$result = mysqli_query($link, $sql)
			  or die('SQL syntax error: ' . mysqli_error($link));
			  
		
			echo "<center><h1>Resultado ".mysqli_num_rows($result)."</h1></center>";
         
			while ($row = mysqli_fetch_array($result)) {
				//Field names are case sensitive and must match
				//the case used in sql statement
				$title = $row['title'];
				$ISBN = $row['isbn'];
				$description = $row['description'];
				$authors = fListAuthors($link, $ISBN);
				$short = substr($row['description'], 0, 80).'...';
				echo  "<div class='templatemo_product_box'>
									<h1><a href='ProductPage.php?isbn=".$ISBN."'>". $title."</a> <span>(".$authors.")</span></h1>
									<a href='ProductPage.php?isbn=".$ISBN."'> <img src='resources/uploads/".$ISBN.".01.MZZZZZZZ.jpg' height='150' width='100'/> </a>
									<div class='product_info'>
										<p> ".$short." </p>
										<div class='buy_now_button'><a href='shoppingCart.php?addISBN=".$ISBN."'>Comprar</a></div>
                    					<div class='detail_button'><a href='ProductPage.php?isbn=".$ISBN."'>Detalhe</a></div>
                    				</div>
					                <div class='cleaner'>&nbsp;</div>
					            </div><br>
					            <div class='cleaner_with_width'>&nbsp;</div><br>
								  ";
			}
         
   
      
      ?>
				</div>

			<!--Open Footer-->
			<?php
				include 'resources/includes/footer.html';
			?>
			<!--Close Footer-->
		</div>
	</body>
</html>