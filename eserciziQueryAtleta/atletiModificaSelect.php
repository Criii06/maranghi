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
    ?>
    <form action="modificaElimina.php" method="post">
        <select name="atleta">
            <option>Seleziona un atleta</option>
            <?php
                $sql = "SELECT * FROM Atleti";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($riga = mysqli_fetch_assoc($result)){
                        echo "<option value='".$riga["id_atleta"]."'>".$riga["nome"]."</option>";
                    }
                } else {
                    echo 'No records found.';
                }

                mysqli_close($conn);
            ?>
        </select>
        <input type="submit" value="Invia" />
    </form>
</body>
</html>
