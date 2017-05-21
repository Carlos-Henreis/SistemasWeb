<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- the head section -->
    <head>
        <title>VALIDA</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>

    <!-- the body section -->
    <body>
        <div id="content">
            <h2>Success</h2>
            <p>The following registration information has been successfully
               submitted.</p>
            <ul>
                <li>Email: <?php echo htmlspecialchars($email); ?></li>
                <li>First Name: <?php echo htmlspecialchars($firstName); ?></li>
                <li>Last Name: <?php echo htmlspecialchars($lastName); ?></li>
                <li>Address: <?php echo htmlspecialchars($address); ?></li>
                <li>City: <?php echo htmlspecialchars($city); ?></li>
                <li>State: <?php echo htmlspecialchars($state); ?></li>
                <li>ZIP: <?php echo htmlspecialchars($zip); ?></li>
                <li>Phone: <?php echo htmlspecialchars($phone); ?></li>
                <li>Card Type: <?php echo htmlspecialchars($cardType); ?></li>
                <li>Card Number: <?php echo htmlspecialchars($cardNumber); ?></li>
                <li>Expiration: <?php echo htmlspecialchars($expDate); ?></li>
            </ul>
        </div>
    </body>
</html>