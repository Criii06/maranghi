<?php
include "conn.php";
$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$codice = $_POST['codice_articolo'];
$descrizione = $_POST['descrizione'];
$quantita = $_POST['quantita'];
$prezzo = $_POST['prezzo'];
$fk_fornitore = $_POST['fk_fornitore'];
$sql = "UPDATE articoli SET 
    descrizione = '$descrizione', 
    quantita = '$quantita', 
    prezzo = '$prezzo', 
    fk_fornitore = '$fk_fornitore' 
    WHERE codice_articolo = '$codice'";
if (mysqli_query($conn, $sql)) {
    echo "Articolo modificato con successo";
} else {
    echo "Errore durante la modifica dell'articolo: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location: menu.php");
exit();
?>