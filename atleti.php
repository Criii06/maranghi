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
     $database = "fagiani_gareAtleti";

     $conn = mysqli_connect($servername, $db_username, $db_password, $database);

     if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $selezionato = $_POST["selezionato"];

    $sql = "SELECT * FROM ".$selezionato;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($riga = mysqli_fetch_assoc($result)) {
            echo "<pre>";
            print_r($riga); 
            echo "</pre>";
        }
    } else {
        echo "nce niente";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
