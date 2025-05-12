<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include "conn.php"; 
session_start();

if (!isset($_SESSION['autenticato']) || $_SESSION['autenticato'] !== true) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM eventi";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr>";
    echo "<th>Nome evento</th>";
    echo "<th>Posti disponibili</th>";
    echo "<th>Prezzo evento</th>";
    echo "<th>Prenota</th>";
    echo "</tr>";

    while ($riga = mysqli_fetch_assoc($result)) {
        // Recupero dei posti prenotati per l'evento
        $sqlPostiPresi = "SELECT SUM(postiPrenotati) AS postiPresi FROM prenotazioni WHERE id_evento = " . $riga['id'];
        $resultPostiPresi = mysqli_query($conn, $sqlPostiPresi);
        $postiPresi = 0; // Imposto un valore di default per i posti prenotati

        if ($resultPostiPresi && mysqli_num_rows($resultPostiPresi) > 0) {
            $rigaPostiPresi = mysqli_fetch_assoc($resultPostiPresi);
            $postiPresi = $rigaPostiPresi['postiPresi'];
        }

        // Calcolo dei posti disponibili
        $postiDisponibili = $riga['posti'] - $postiPresi;

        echo "<tr>";
        echo "<td>" . htmlspecialchars($riga['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($postiDisponibili) . "</td>";
        echo "<td>" . htmlspecialchars($riga['prezzo']) . "</td>";
        echo "<td>";
        if ($postiDisponibili > 0) {
            echo "<form action='prenotazione.php' method='post'>";
            echo "<input type='hidden' name='evento_id' value='" . htmlspecialchars($riga['id']) . "'>";
            echo "<input type='submit' name='prenota' value='Prenota'>";
            echo "</form>";
        } else {
            echo "Esaurito";
        }
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nessun evento trovato.";
}
?>

<a href="login.php">logout</a>;

</body>
</html>
