<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>

  

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $nazione = $_POST["nazione"];

        $servername = "10.1.0.52";
        $db_username = "fagiani";
        $db_password = "fagiani";
        $database = "fagiani_gareAtleti";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO Atleti (nome, cognome, nazione, id_atleta) VALUES ('$nome', '$cognome', '$nazione', '888')";

        if (mysqli_query($conn, $sql)) {
            echo "tutt'apposto";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
