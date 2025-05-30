<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$numeri = array();

for($i=0; $i<100; $i++){
    array_push($numeri, rand(1,1000));
}

var_dump($numeri);

function media ($v){
    $somma = 0;
    $nValori =  0;
    for($i=0; $i<count($v); $i++){
        $somma += $v[$i];
        $nValori++;
    } 
    $risultato = $somma/$nValori;
    return $risultato;
}

function massimo ($v){
    $max = 0;
    for($i=0; $i<count($v); $i++){
        if($v[$i]>$max){
            $max = $v[$i];
        }
    } 
    return $max;
}

$media = media($numeri);
$massimo = massimo($numeri);

echo "<br>MEDIA: ".$media."<br>";
echo "MASSIMO: ".$massimo."<br>";

$numeriSopraMedia = array();

for($i=0; $i<count($numeri); $i++){ // Corretto l'errore nell'array (numeri -> $numeri)
    if($numeri[$i] > $media){
        array_push($numeriSopraMedia, $numeri[$i]); // Corretto l'errore (numeri[i] -> $numeri[$i])
    }
}

echo "<h2>Numeri sopra la media:</h2>";

if(count($numeriSopraMedia) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Numero</th></tr>";
    foreach($numeriSopraMedia as $numero) {
        echo "<tr><td>".$numero."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Non ci sono numeri sopra la media.</p>";
}

$studenti5i = array("Troiani" => date_create(2006-08-09),"Urbanelli"=> date_create(2006-04-09), "Rui"=> date_create(2006-05-09), "Spigarelli"=> date_create(2006-01-09));
echo date("Y m d");
?>
</body>
</html>
