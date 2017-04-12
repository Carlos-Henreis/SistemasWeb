<?php
if (isset($_COOKIE['cookie_name']))
    setcookie('cookie_name', $_COOKIE['cookie_name'] + 1, time() + 36000);
else
    setcookie('cookie_name', 1, time() + 36000);
?>
<html>
    <body>
        <p>
            Prezado Cliente, um cookie foi setado nesta página! O cookie ficará ativo
            quando o cliente enviá-lo de volta ao servidor. Seu valor sera alterado a cada visita na
            página
        </p>
        <p> Valor do Cookie:<b>(<?= $_COOKIE['cookie_name'] ?>)</b> </p>
    </body>
</html>
