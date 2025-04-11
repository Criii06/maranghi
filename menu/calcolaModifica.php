<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_POST['svuota'])){
        session_unset();
        session_destroy();
    }else{

        
        $prezzi=["tagliatella"=>15,
                "pizza"=>10,
                "ciccia"=>25
                ];
        $_SESSION['tagliatella']=(int)$_GET['taglia'];
        
            $_SESSION['pizza']=(int)$_GET['pizza'];
       
        $_SESSION['ciccia']=(int)$_GET['ciccia'];

     
        echo("<table border=1>");
        $tot=0;
        foreach ($_SESSION as $nome => $numero) {
            $euri=$numero*$prezzi[$nome];
            $tot+=$euri;
            echo("<tr><td>$nome</td><td>$numero</td><td>$euri</td></tr>");
        }
        echo("<tr><td colspan='3'>totale= $tot</td></tr></table>");
       
    }
    echo("<a href=menuModifica.php>indietro</a>");
    ?>
    <form method="post" action="calcola.php">
        <input type="submit" value="svuota" name="svuota">
    </form>
</body>
</html>