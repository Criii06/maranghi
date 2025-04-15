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
    die("Connessione fallita: " . mysqli_connect_error());
}


$sql = "SELECT categorie.nome FROM categorie";
        $result = mysqli_query($conn, $sql);

        echo '<form method="POST">';
        echo '<select name="categoria">';
        foreach ($result as $riga) {
            echo '<option value="' . htmlspecialchars($riga['nome']) . '">' . htmlspecialchars($riga['nome']) . '</option>';
        }
        
        echo '</select>';
        echo '<p>titolo libro</p>';
        echo '<input name="titolo" type="text">';
        echo '<input type="submit" value="INSERISCI">';
        echo '</form>';

        if (isset($_POST['nome']) && isset($_POST['categoria'])) {
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];
        
            $sqlInserisci = "INSERT INTO libri (nome, categoria) VALUES ('$nome', '$categoria')";
        }

?>    


</body>
</html>