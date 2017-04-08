<html><head></head>
    <body>
        <?php
        if (isset($_SERVER['HTTP_REFERER'])) {
            echo "Referer: " . $_SERVER["HTTP_REFERER"] . "<br />";
        }
        echo "Browser: " . $_SERVER["HTTP_USER_AGENT"] . "<br />";
        echo "IP address: do usuário" . $_SERVER["REMOTE_ADDR"];
        ?>
        <?php
        echo "<br/><br/><br/>";
        echo "<h2>Toda informação</h2>";
        foreach ($_SERVER as $key => $value) {
            echo $key . " = " . $value . "<br/>";
        }
        ?>
    </body>
</html>