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
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $codice_articolo = mysqli_real_escape_string($conn, $_POST['codice_articolo']);
    $SQL = "SELECT * FROM articoli WHERE codice_articolo = '$codice_articolo'";
    $result = mysqli_query($conn, $SQL);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $codice = $row['codice_articolo'];
    $descrizione = $row['descrizione'];
    $quantita = $row['quantita'];
    $prezzo = $row['prezzo'];
    $fk_fornitore = $row['fk_fornitore'];
    ?>
    
    <form action="esegui_modifica.php" method="post">
        <label>Codice Articolo:</label>
        <input type="text" name="codice_articolo" value="<?php echo $codice; ?>" readonly>

        <label>Descrizione:</label>
        <input type="text" name="descrizione" value="<?php echo $descrizione; ?>">

        <label>Quantità:</label>
        <input type="number" name="quantita" value="<?php echo $quantita; ?>">

        <label>Prezzo:</label>
        <input type="number" step="0.01" name="prezzo" value="<?php echo $prezzo; ?>">

        <label>Fornitore:</label>
        <input type="text" name="fk_fornitore" value="<?php echo $fk_fornitore; ?>">

        <input type="submit" value="Modifica Articolo">
    </form>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>