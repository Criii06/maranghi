<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$tr = "<tr>";
$trc = "</tr>";
$td = "<td>";
$tdc = "</td>";

echo "<table>";

echo $tr;

for($c=1; $c<=10; $c++){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;


echo $tr;

for($c=2; $c<=20; $c=$c+2){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=3; $c<=30; $c=$c+3){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;


echo $tr;

for($c=4; $c<=40; $c=$c+4){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=5; $c<=50; $c=$c+5){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=6; $c<=60; $c=$c+6){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=7; $c<=70; $c=$c+7){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=8; $c<=80; $c=$c+8){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=9; $c<=90; $c=$c+9){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;

echo $tr;

for($c=10; $c<=100; $c=$c+10){
    echo $td;
    echo $c;
    echo $tdc;
}

echo $trc;


echo "</table>";

?>
</body>
</html>