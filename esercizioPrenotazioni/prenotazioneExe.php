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
    $sql = "insert into prenotazioni (id_evento, id_utente) values ('" . $_POST['evento_id'] . "', '" . $_SESSION['id'] . "')";
    $result = mysqli_query($conn, $sql);
    ?>
</body>
</html>