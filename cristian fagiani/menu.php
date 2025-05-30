<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articoli da fornitore</title>
</head>
<body>

    <form method="get" action="popola.php">
        <label>clicca per popolare db</label>
        <input type="submit" value="Invia">
    </form>

    <form method="get" action="articoli_da_fornitore.php" >
        <label> Inserici codice fornitore </label>
        <input type="text" name="codiceFornitore">
        <input type="submit" value="Invia">
    </form>

    <form method="get" action="articoli_sotto_quantita.php">
        <label> Inserici quantita </label>
        <input type="number" name="quantita">
        <input type="submit" value="Invia">
    </form>

    <form  method="get" action="modifica_articoli">
        <label> Scegli articolo da modificare </label>
        <select name="articoli">
            <?php
            include 'conn.php';
            $conn = mysqli_connect($servername, $db_username, $db_password, $database);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $query = "SELECT * FROM articoli";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['codice_articolo'] . "'>" . $row['descrizione'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Invia">

    </form>
</body>
</html>