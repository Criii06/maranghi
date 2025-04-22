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

        $sql = "SELECT libri.titolo, autori.nome as nomeAut, categorie.nome as nomeCat FROM libri, categorie, autori, autori_libri, categorie_libri WHERE libri.id = autori_libri.id_libro AND libri.id = categorie_libri.id_libro AND autori.id = autori_libri.id_autore AND categorie.id = categorie_libri.id_categoria";

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