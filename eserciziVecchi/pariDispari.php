<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(1,100);
    echo ($n);
    if($n % 2 == 0){
        echo " è paro";
    }else{
        echo " è disparo";
    }
    ?>
</body>
</html>