<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Libro</title>
</head>
<body>

<?php
$servername = "10.1.0.52:8306";
$db_username = "fagiani";
$db_password = "fagiani";
$database = "fagiani_libreria";

$conn = mysqli_connect($servername, $db_username, $db_password, $database);

if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

// Recupera le categorie dalla tabella categorie
$sql1 = "SELECT id, nome FROM categorie";
$sql2 = "SELECT id, nome FROM autori";
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);

echo '<form method="POST">';
echo '<select name="categoria">';
while ($riga = mysqli_fetch_assoc($result1)) {
    echo '<option value="' . $riga['id'] . '">' . $riga['nome'] . '</option>';
}
echo '</select>';
echo '<p>autore</p>';
echo '<select name="autore">';
while ($riga = mysqli_fetch_assoc($result2)) {
    echo '<option value="' . $riga['id'] . '">' . $riga['nome'] . '</option>';
}
echo '<p>titolo libro</p>';
echo '<input name="titolo" type="text" required>';
echo '<input type="submit" value="INSERISCI">';
echo '</form>';

if (isset($_POST['categoria']) && isset($_POST['titolo']) && isset($_POST['autore'])) {
    // Recupera l'ID della categoria e il titolo del libro dal form
    $titolo = $_POST['titolo'];
    $categoriaId = $_POST['categoria'];
    $autoreId = $_POST['autore'];

    // Inserisce il libro nella tabella 'libri' con l'ID della categoria
    $sqlInserisciLibro = "INSERT INTO libri (titolo) VALUES ('$titolo')";
    
    if (mysqli_query($conn, $sqlInserisciLibro)) {
        // Ottieni l'ID del libro appena inserito
        $libroId = mysqli_insert_id($conn);
        
        // Inserisce la relazione tra il libro e la categoria nella tabella 'categorie_libri'
        $sqlInserisciCategoriaLibro = "INSERT INTO categorie_libri (id_libro, id_categoria) VALUES ($libroId, $categoriaId)";

        //inserusce la relazione tra il libro e l'autore nella tabella 'categorie_libri'
        $sqlInserisciAutoreLibro = "INSERT INTO autori_libri (id_libro, id_autore) VALUES ($libroId, $autoreId)"; 
        
        if (mysqli_query($conn, $sqlInserisciCategoriaLibro)) {
            echo "<p>Libro inserito con successo!</p>";
        } else {
            echo "<p>Errore nell'inserimento della relazione libro-categoria: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Errore nell'inserimento del libro: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>
  <p>
    <a href="menuLibreria.php">torna al menu</a>
    </p>
</body>
</html>
