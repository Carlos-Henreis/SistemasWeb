<?php
  session_start();


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
			?>
			<!--Close Header-->

			<div class="bodyContainer">
			
				<div class="checkoutContainer">

					<div class="emailBox">
						<form method="POST">
                  			<input class="textfield" type="text" name="email" autofocus placeholder="Email" required/> <br>
                  			<input class="button" type="submit" value="Finalizar venda" />
            			</form>
					</div>

				</div>

			</div>

			<!--Open Footer-->
			<?php
				include 'resources/includes/footer.html';

				@$email = $_POST['email'];

				if(!fIsValidEmail($email) && !empty($email)) {
					echo "<script type='text/javascript'>alert('Please input a valid email');</script>";
				}

				if(fIsValidEmail($email)) {
					$link = connect();

					$sql = "SELECT email
							FROM bookcustomers
							WHERE email LIKE '$email'";

					$result = mysqli_query($link, $sql)
						or die('SQL syntax error: ' . mysqli_error($link));

					if(mysqli_num_rows($result) != 0) {
						$sql = "INSERT into bookcustomers";
					}

					$_SESSION['email'] = strtolower($email);
					header("location: checkout02.php"); exit;
				}
			?>
			<!--Close Footer-->
		</div>
	</body>
</html>