<html><head><meta charset="utf-8"></head>
    <body>
        <form action="index2.php" method="post">
            Nome: <input type="text" name="f_name" value="<?php echo get_post_value($_POST['f_name']) ?>"/> <br/>
            Sobrenome<b>*</b>:<input type="text" name="l_name" value="<?php echo get_post_value($_POST['l_name'])?>" /> <br/>
            Email<b>*</b>:<input type="text" name="email" value="<?php echo get_post_value($_POST['email'])?>" /> <br/>
            Sistema Operacional: <input type="text" name="os" value="<?php echo get_post_value($_POST['os'])?>" /> <br/><br/>
            <input type="submit" name="submit" value="Submit" /> <input type="reset" />
        </form>
    </body>
</html>