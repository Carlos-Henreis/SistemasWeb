<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Language" content="pt-br">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COM222-CK01</title>
		<link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="templatemo_container">

			<!--Open Header-->
			<?php
				include '/resources/includes/header.html';
			?>
			<!--Close Header-->

			<div id="templatemo_content">
			
				<div class="checkoutContainer">
				
					<form method="post" action="login.php" autocomplete="on">
						<div class='title2'> Acesso aos usuarios </div>
						<H1 align="center">Acesso aos usuarios</H1>
			            <?php
			            // Exibir mensagem de erro caso ocorra 
			            if (isset($_GET["erro"])) {
			                $erro = $_GET["erro"];
			                echo "<CENTER><FONT color='red'> $erro</FONT></CENTER>";
			            }
			            ?>

						<table class="formTable">
					         <tr>
					            <td class="label" >
					               Login: </td>
					            <td>
					               <input type="text" name="txtLogin" autofocus placeholder="e-mail para logar" required/>
					            </td>
					         </tr>

					         <tr>
					            <td class="label">
					               Senha: </td>
					            <td>
					               <input type="password" name="txtSenha" autofocus placeholder="Senha" required/>
					            </td>
					         </tr>

					         <tr>
					            <td>
					            	<input class="button" type="reset" value="Limpar"/>
					            </td>
					            <td>
					               	<input class="button" type="submit" value="Logar"/>
					            </td>
					         </tr>
					    </table>
					</form>
				</div>

			<!--Open Footer-->
			<?php
				include '/resources/includes/footer.html';
			?>
			<!--Close Footer-->
		</div>
	</body>
</html>