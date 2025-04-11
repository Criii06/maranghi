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
    $qTaglia= $_SESSION['tagliatella']??0;
    $qPizza= $_SESSION['pizza']??0;
    $qCiccia= $_SESSION['ciccia']??0;
    ?>
    <form action="calcolaModifica.php" method="get">
        <p>tagliatella 15€ <input type="number" value="<?php echo $qTaglia ?>" name="taglia"></p>
        <p>pizza 5€ <input type="number" value="<?php echo $qPizza ?>"name="pizza"></p>
        <p>ciccia 25€ <input type="number" value="<?php echo $qCiccia ?>" name="ciccia"></p>
        <input type="submit">
    </form>
</body>
</html>