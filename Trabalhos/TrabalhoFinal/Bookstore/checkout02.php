<?php
    session_start();

    if (!isset($_SESSION['email'])) {
		header("location: checkout01.php");
	}

	if($_COOKIE['BookCount'] == null)
		header("location: index.php");

	$email = $_SESSION['email'];
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

				$sql = "SELECT custID
						FROM bookcustomers
						WHERE email LIKE '$email'";

				$result = mysqli_query($link, $sql)
					or die('Erro no SQL: ' . mysqli_error($link));
			?>
			<!--Close Header-->

			<div class="bodyContainer">
				
					<form method="post" action="checkout03.php" autocomplete="on">

						<?php
							if(mysqli_num_rows($result) == 0) {
								echo "<div class='title2'> Novo Cliente - Forneça seu endereço de e-mail. </div>";
								$check = "new";
							} 
							else {
								echo "<div class='title2'> Retornando as vendas - Confirme seu endereço de e-mail. </div>"; 
								$check = "old";

								$sql = "SELECT custID, fname, lname, street, city, state, zip
									FROM bookcustomers
									WHERE email LIKE '$email'";

								$result = mysqli_query($link, $sql)
									or die('SQL syntax error: ' . mysqli_error($link));

								$row = mysqli_fetch_array($result);
							}
						?>

						<table class="formTable">
					         <tr>
					            <td class="label" >
					               Email: </td>
					            <td>
					               <input type="email" name="email" value="<?php echo $email ?>" required placeholder="Entre com o e-mail" maxlength="50" />
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               Nome: </td>
					            <td>
					               <input type="text" name="fname" value="<?php @$fname= $row['fname']; echo $fname;?>" autofocus required  
					                      placeholder="nome" title="nome" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               Sobrenome: </td>
					            <td>
					               <input type="text" name="lname" value="<?php @$lname= $row['lname']; echo $lname;?>" required 
					                      placeholder="Sobrenome" title="sobrenome" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
					            </td>
					         </tr>
					         <tr>
					            <td class="label">
					               endereço: </td>
					            <td>
					               <input type="text" name="street" value="<?php @$street= $row['street']; echo $street;?>" required 
					                      placeholder="Endereço" title="endereço" maxlength="25" />
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               Cidade: </td>
					            <td>
					               <input type="text" name="city" value="<?php @$city= $row['city']; echo $city;?>" required 
					                      placeholder="cidade" title="cidade" maxlength="30"  pattern="[A-Za-z'-]{2,30}" />
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               Estado: </td>
					            <td>
					               <input type="text" name="state" style="width:40px" value="<?php @$state= $row['state']; echo $state;?>" required 
					                      placeholder="OK" title="Apenas 2 caracteres" max length="2" pattern="[A-Za-z]{2}" />
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               CEP: </td>
					            <td>
					               <input type="text" name="zip" style="width:60px;" value="<?php @$zip= $row['zip']; echo $zip;?>" required 
					                      placeholder="CEP" title="CEP" maxlength="5" pattern="[0-9]{5}" />
					            </td>
					         </tr>

					         <tr>
					            <td>
					            </td>
					            <td>
					               <!-- sample site uses mcrypt encryption enhancement for custID -->
					               <!-- source: //source: http://stackoverflow.com/questions/2448256/php-mcrypt-encrypting-decrypting-file -->
					               <input type="hidden" name="custIDe" value="vVXT5PM0gelqDHlHxU8U3uTRSMk5xKJ6A8aGx%2B7LhO1OsXdC1sdkn6Pfv8vpzj5X46GzlZPCa%2FmhF6%2FMP1rDMw%3D%3D">
					               <input type="hidden" name="check" value="<?php echo $check; ?>">
					               <br><br>
					               <input class="button" type="submit" value="Finalizar Compra" />
					            </td>
					         </tr>
					    </table>
					</form>

			</div>

			<!--Open Footer-->
			<?php
				include 'resources/includes/footer.html';
			?>
			<!--Close Footer-->
		</div>
	</body>
</html>