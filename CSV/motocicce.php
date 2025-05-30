<?php
// Connessione ---------------------
$servername = "10.1.0.52:8306";
$db_username = "fagiani";
$db_password = "fagiani";
$database = "fagiani_giammi";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    die("Errore connessione: " . mysqli_connect_error());
}

// Apri il file CSV
$file = fopen("moto.csv", "r") or die("Impossibile aprire il file!");
$righe = [];
while ($riga = fgetcsv($file, 1000, ",")) {
    $righe[] = $riga;
}
fclose($file);

// Ottieni il nome della tabella
$table_name = $righe[0][0];

// Creazione della tabella dinamicamente
$sql1 = "CREATE TABLE IF NOT EXISTS $table_name (";

for ($i = 1; $i < count($righe[1]); $i += 2) {
    // Nome della colonna (indice dispari) e tipo di dato (indice pari)
    $column_name = $righe[1][$i-1];
    $column_type = $righe[1][$i];

    // Imposta il tipo di dato per MySQL
    $mysql_type = ($column_type == 'char') ? 'VARCHAR(255)' : ($column_type == 'int' ? 'INT' : 'VARCHAR(255)');
    
    // Aggiungi la colonna alla query
    $sql1 .= "$column_name $mysql_type, ";
}

// Rimuovi l'ultima virgola e chiudi la parentesi della query
$sql1 = rtrim($sql1, ", ") . ");";

// Esegui la query di creazione tabella
if (mysqli_query($conn, $sql1)) {
    echo "Tabella $table_name creata con successo.<br>";
} else {
    echo "Errore creazione tabella: " . mysqli_error($conn) . "<br>";
}

// Inserimento dei dati nella tabella
for ($i = 2; $i < count($righe); $i++) {
    $values = "(";
    for ($j = 0; $j < count($righe[$i]); $j++) {
        $values .= "'" . mysqli_real_escape_string($conn, $righe[$i][$j]) . "', ";
    }
    $values = rtrim($values, ", ") . ")";
    $sql2 = "INSERT INTO $table_name VALUES $values";

    // Esegui l'inserimento dei dati
    if (mysqli_query($conn, $sql2)) {
        echo "Dati inseriti con successo: $values<br>";
    } else {
        echo "Errore inserimento dati: " . mysqli_error($conn) . "<br>";
    }
}

// Chiudi la connessione
mysqli_close($conn);
?>
