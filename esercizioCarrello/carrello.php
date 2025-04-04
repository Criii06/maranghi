<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <a href="scelta.php">torna</a>
        <form action="carrello.php" method="get">
            <input type="submit" NAME="ELIMINA" value="svuota">
        </form>

    </p>

<?php
session_start();

    if( isset($_GET['ELIMINA'])){
        session_destroy();
    }else{
    
        $prodotto = $_POST["prodotto"];
        $_SESSION[$prodotto]=1+$_SESSION[$prodotto];
        print_r ($_SESSION);
    }

?>
</body>
</html>