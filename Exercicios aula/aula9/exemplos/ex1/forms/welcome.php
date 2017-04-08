<html><head></head>
    <body>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'): 
        ?>
        Você usou o metodo POST!<br/>
        Bem vindo <?php echo $_POST["nome"] . "."; ?><br/>
        Você tem <?php echo $_POST["idade"]; ?> anos!
        <?php else: ?>
        Voce usou o metodo GET!<br/>
        <?php endif; ?>
    </body>
</html>