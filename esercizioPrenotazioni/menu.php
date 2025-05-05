<?php
include "conn.php"; 
session_start();

$sql = "SELECT * FROM eventi";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr>";
    echo "<th>Nome evento</th>";
    echo "<th>Posti evento</th>";
    echo "<th>Prezzo evento</th>";
    echo "<th>Prenota</th>";
    echo "</tr>";

    while ($riga = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($riga['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($riga['posti']) . "</td>";
        echo "<td>" . htmlspecialchars($riga['prezzo']) . "</td>";
        echo "<td>";
        echo "<form action='prenotazione.php' method='post'>";
        echo "<input type='hidden' name='evento_id' value='" . htmlspecialchars($riga['id']) . "'>";
        echo "<input type='submit' name='prenota' value='Prenota'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nessun evento trovato.";
}
?>
