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

    $eventoId = $_POST['evento_id'];
    $sql = "SELECT * FROM eventi WHERE id = '$eventoId'";
    $result = mysqli_query($conn, $sql);
    echo" <h1>stai prenotando i posti per il seguente evento evento</h1>";
    if ($result && mysqli_num_rows($result) > 0) {
        $riga = mysqli_fetch_assoc($result);
        $posti = $riga['posti'];
        $prezzo = $riga['prezzo'];
        $slqPostiPresi="SELECT postiPrenotati FROM prenotazioni WHERE id_evento =" . $eventoId;
        $resultPostiPresi = mysqli_query($conn, $slqPostiPresi);
        echo "<p> Nome evento: " . htmlspecialchars($riga['nome']) . "</p>";
        echo "<p> Posti disponibili: " . htmlspecialchars($posti-mysqli_fetch_assoc($resultPostiPresi)) . "</p>";
        echo "<p> Prezzo evento: " . htmlspecialchars($prezzo) . "</p>";
        echo "<form action='prenotazioneExe.php' method='post'>";
        echo "<input type='number' name='posti_prenotati' min='1' max='$posti'>" ;
        echo "<input type='hidden' name='evento_id' value='$eventoId'>";
        echo "<input type='submit' value='Prenota'>";
        echo "</form>";
    } else {
        echo "Evento non trovato.";
    }
    
    ?>
    <a href="menu.php">torna al menu</a>;
</body>
</html>