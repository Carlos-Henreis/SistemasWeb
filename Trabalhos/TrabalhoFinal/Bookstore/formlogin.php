<!DOCTYPE HTML>
<html>
	<head>
		<title> Bookstore </title>
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


							<form method="post" name="formLogin" action="login.php">
					            <H1 align="center">Acesso aos usuarios</H1>
					            <?php
					            // Exibir mensagem de erro caso ocorra 
					            if (isset($_GET["erro"])) {
					                $erro = $_GET["erro"];
					                echo "<CENTER><FONT color='red'> $erro</FONT></CENTER>";
					            }
					            ?>
			                    <input class="textfield" type="text" name="txtLogin" autofocus placeholder="Usuário para logar" required/>  
			                	<input class="textfield" type="password" name="txtSenha" autofocus placeholder="Senha" required/>
								<input class="button" type="submit" value="Logar">
			                    <input class="button" type="reset" value="Limpar">
					        </form>
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