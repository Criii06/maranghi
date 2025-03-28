<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
</body>
</html>
