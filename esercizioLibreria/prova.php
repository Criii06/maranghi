<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $servername = "10.1.0.52";
        $db_username = "fagiani";
        $db_password = "fagiani";
        $database = "fagiani_libreria";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM utenti WHERE nome = 'paolo' AND PASSWORD = 'rossi'";

        $result = mysqli_query($conn, $sql);

        $risultato=mysqli_fetch_assoc($result);
        print_r($risultato);


    ?>
</body>
</html>