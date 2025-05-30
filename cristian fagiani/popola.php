<?php
// Connessione
include "conn.php";
$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn){
    $myfile = fopen("log.csv", "w") or die("errore apertura file");
    $txt = "errore di connessione: " . mysqli_connect_error();
    fwrite($myfile, $txt);
    fclose($myfile);
    die("Connection failed: " . mysqli_connect_error()); 
}

// Apri il file CSV
$file = fopen("Maga.csv", "r") or die("Impossibile aprire il file!");
$righe = [];
while ($riga = fgetcsv($file, 1000, ",")) {
    $righe[] = $riga;
}
fclose($file);

// Inserimento dei dati nella tabella
for ($i = 0; $i < count($righe); $i++) {
    $values = "(";
    for ($j = 0; $j < count($righe[$i]); $j++) {
        
        if($righe[$i][$j] == "F"){
            $tabella = "fornitore";
        }else{
            if($righe[$i][$j] == "A"){
                $tabella = "articoli";
            }else{
                $values .= "'" . mysqli_real_escape_string($conn, $righe[$i][$j]) . "', ";
            }
        }
    }
    $values = rtrim($values, ", ") . ")";

    $sql2 = "INSERT INTO " . $tabella . " VALUES" . $values . "";
    //secho $sql2;
    //var_dump($righe);

    // Esegui l'inserimento dei dati
    if (mysqli_query($conn, $sql2)) {
        echo "Dati inseriti con successo";
    } else {
        echo "Errore inserimento dati: " . mysqli_error($conn) . "<br>";
    }
}

// Chiudi la connessione
mysqli_close($conn);
?>