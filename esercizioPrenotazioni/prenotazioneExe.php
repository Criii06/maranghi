<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PRENOTAZIONE AVVENUTA CON SUCCESSO</h1>
    <?php
    include "conn.php";
    session_start();

    if (!isset($_SESSION['autenticato']) || $_SESSION['autenticato'] !== true) {
        header("Location: login.php");
        exit();
    }

    $sql = "insert into prenotazioni (id_evento, id_utente, postiPrenotati) values ('" . $_POST['evento_id'] . "', '" . $_SESSION['id'] . "' , '" . $_POST['posti_prenotati'] . "')";
    $result = mysqli_query($conn, $sql);
    ?>
    <a href="menu.php">torna a menu</a>;
</body>
</html>