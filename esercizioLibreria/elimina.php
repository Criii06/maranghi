<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controllo Permessi</title>
</head>
<body>
    <?php
    if (!isset($_COOKIE["permessi"]) || $_COOKIE["permessi"] != "edit") {
        header("Location: menuLibreria.php");
    } else {
        $servername = "10.1.0.52";
        $db_username = "fagiani";
        $db_password = "fagiani";
        $database = "fagiani_libreria";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connessione fallita: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titolo'])) {
            $titolo =  $_POST['titolo'];
            $sqlElimina = "DELETE FROM libri WHERE titolo = '$titolo'";

            if (mysqli_query($conn, $sqlElimina)) {
                echo "<p>Libro eliminato con successo!</p>";
            } else {
                echo "<p>Errore nell'eliminazione: " . mysqli_error($conn) . "</p>";
            }
        }

        // Visualizza elenco dei libri
        $sql = "SELECT libri.titolo FROM libri";
        $result = mysqli_query($conn, $sql);

        echo '<form method="POST">';
        echo '<select name="titolo">';
        foreach ($result as $riga) {
            echo '<option value="' . htmlspecialchars($riga['titolo']) . '">' . htmlspecialchars($riga['titolo']) . '</option>';
        }
        
        echo '</select>';
        echo '<button type="submit">Elimina Libro</button>';
        echo '</form>';

        mysqli_close($conn);
    }
    ?>
</body>
</html>
