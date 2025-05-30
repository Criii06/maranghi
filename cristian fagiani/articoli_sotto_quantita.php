<?php

include "conn.php";
$conn = mysqli_connect($servername, $db_username, $db_password, $database);
if (!$conn) {
    $myfile = fopen("log.csv", "w") or die("errore apertura file");
    $txt = "errore di connessione: " . mysqli_connect_error();
    fwrite($myfile, $txt);
    fclose($myfile);
    die("Connection failed: " . mysqli_connect_error());
}
$quantita = $_GET["quantita"];

$sql = "SELECT articoli.*
FROM articoli
WHERE articoli.quantita < '$quantita'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Errore nella query: " . mysqli_error($conn));
}
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['codice_articolo'] . "</td>";
    echo "<td>" . $row['descrizione'] . "</td>";
    echo "<td>" . $row['quantita'] . "</td>";
    echo "<td>" . $row['prezzo'] . "</td>";
    echo "<td>" . $row['fk_fornitore'] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='menu.html'>torna a menu</a>";
mysqli_close($conn);
?>