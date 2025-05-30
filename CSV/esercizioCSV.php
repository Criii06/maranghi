<?php

//connessione ---------------------
$servername = "10.1.0.52:8306";
$db_username = "fagiani";
$db_password = "fagiani";
$database = "fagiani_negozio";
$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    die("errore connessione: " . mysqli_connect_error());
}

//scrittura su file csv ---------------------
$myfile = fopen("prodotti.csv", "w") or die("errore apertura file");
$sql = "SELECT * FROM Prodotti";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $txt = $row['id_prodotto'].",".$row['descrizione'].",".$row['prezzo']."\n";
    //$txt = implode(",", $row);
    //fputcsv($myfile, $row);
    //fput è per scrivere un array in un file csv, e fgetcsv è per leggere un file csv in un array
    fwrite($myfile, $txt);
}
fclose($myfile);
?>
