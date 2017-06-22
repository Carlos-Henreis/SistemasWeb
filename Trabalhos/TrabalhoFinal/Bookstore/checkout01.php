<?php
$bookArray = null;
$cookieName = "cart";
// retrieve cookie and unserialize into $bookArray
if (isset($_COOKIE[$cookieName])) {
   $bookArray = unserialize($_COOKIE[$cookieName]);
}
$totalbooks = 0;
if (isset($bookArray)) {

    //Conta o total de books no carrinho

    foreach ($bookArray as $isbn => $qty) {
      $totalbooks += $qty;
    }
    setCookie('BookCount', $totalbooks, time() + 60 * 60 * 24 * 180);
}
?>

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
            ?>
            <div id="templatemo_content">
            
                <div class="checkoutContainer">
                    <h1 align="center"><p> Você tem <?php echo $totalbooks; ?> items no seu carrinho.</p></h1>
                    <div class="emailBox">
                        <form method="POST" action="checkout02.php">
                            <input class="textfield" type="email" name="email" autofocus placeholder="Email" required/> <br>
                            <input class="button" type="submit" value="Prosseguir" />
                        </form>
                    </div>

                </div>

            <!--Open Footer-->
                <?php
                    include 'resources/includes/footer.html';
                ?>
                <!--Close Footer-->
            </div>
        </div>
    </body>
</html>

  


