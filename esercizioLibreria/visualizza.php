<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $servername = "10.1.0.52:8306";
        $db_username = "fagiani";
        $db_password = "fagiani";
        $database = "fagiani_libreria";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "
        SELECT libri.titolo, autori.nome, categorie.nome
        FROM libri
        JOIN autori_libri ON libri.id = autori_libri.id_libro
        JOIN autori ON autori_libri.id_autore = autori.id
        JOIN categorie_libri ON libri.id = categorie_libri.id_libro
        JOIN categorie ON categorie_libri.id_categoria = categorie.id;
";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            
            $columns = mysqli_fetch_fields($result);
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<th>" . htmlspecialchars($column->name) . "</th>";
            }
            echo "</tr>";
    
            while ($riga = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($riga as $campo) {
                    echo "<td>" . htmlspecialchars($campo) . "</td>";
                }
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "Non ci sono dati";
        }

        mysqli_close($conn);    

    ?>
    <p>
    <a href="menuLibreria.php">torna al menu</a>
    </p>
</body>
</html>