<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-CK02</title>
		<link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="templatemo_container">

			<!--Open Header-->
			<?php
				include 'resources/includes/header.html';

				$link = connect();
				$email = $_POST['email'];
				$sql = "SELECT *
						FROM bookcustomers
						WHERE email LIKE '$email'";

				$result = mysqli_query($link, $sql)
					or die('Erro no SQL: ' . mysqli_error($link));
			?>
			<!--Close Header-->

			
			<div id="templatemo_content">
			
				<div class="checkoutContainer">
				
					<form method="post" action="checkout03.php" autocomplete="on">

						<?php
							if(mysqli_num_rows($result) == 0) {
								echo "<div class='title2'> Benvido ao nosso site -- Por favor, forneça um endereço para entrega </div>";
								$check = "new";
							} 
							else {
								echo "<div class='title2'> Benvindo de volta -- Por favor, confirme seu endereço de entrega. </div>"; 
								$check = "old";


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
					                      placeholder="CEP" title="CEP apenas 5 numeros" maxlength="5" pattern="[0-9]{5}" />
					            </td>
					         </tr>

					         <tr>
					            <td>
					            </td>
					            <td>
					            	<input class="button" type="submit" value="Prosseguir" />
					               	<input type="hidden" name="custID" value="<?php echo $row['custID']; ?>">
					               	<input type="hidden" name="check" value="<?php echo $check; ?>">
					               	<br><br>
					               	
					            </td>
					         </tr>
					    </table>
					</form>
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