<!DOCTYPE html>
<html>

<body>
<style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
       
</style>

<?php

function media ($vm, $vi, $vs){
    $somma = 0;
    $somma += $vm;
    $somma += $vi;
    $somma += $vs;
    $risultato = $somma / 3;
    return $risultato;
}

$studenti = [
    ["nome" => "Mario", "votoMatematica" => 8, "votoItaliano" => 7, "votoStoria" => 6],
    ["nome" => "Lucia", "votoMatematica" => 10, "votoItaliano" => 8, "votoStoria" => 9],
    ["nome" => "Franco", "votoMatematica" => 6, "votoItaliano" => 2, "votoStoria" => 4],
];

echo "<table>";

echo "<tr>
        <th>Studente</th>
        <th>Matematica</th>
        <th>Italiano</th>
        <th>Storia</th>
        <th>Media</th>
        <th>Stato</th>
      </tr>";


foreach($studenti as $studente){
    echo "<tr>";
    echo "<td>{$studente["nome"]}</td>";
    echo "<td>{$studente["votoMatematica"]}</td>";
    echo "<td>{$studente["votoItaliano"]}</td>";
    echo "<td>{$studente["votoStoria"]}</td>";
    echo "<td>" . media($studente["votoMatematica"], $studente["votoItaliano"], $studente["votoStoria"]) ."</td>";
    if(media($studente["votoMatematica"], $studente["votoItaliano"], $studente["votoStoria"])>6){
        echo "<td>promosso (bravo coccone)</td>";
    }else{
        echo "<td>bocciato (tonto)</td>";
    }
    ;

    echo "</tr>";
    }


echo "</table>";
?>

</body>
</html>
