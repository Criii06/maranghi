<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALUTO PHP</title>
</head>
<body>
    <h1>Funziona</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupero i valori inviati tramite POST
    if (isset($_POST['nome'])) {
        $nome = $_POST['nome'];
    } else {
        $nome = 'Non specificato';
    }
    
    if (isset($_POST['cognome'])) {
        $cognome = $_POST['cognome'];
    } else {
        $cognome = 'Non specificato';
    }
    
    if (isset($_POST['sesso'])) {  // Cambiato 'F' in 'sesso'
        $sesso = $_POST['sesso'];
    } else {
        $sesso = 'Non specificato';
    }
    
    if (isset($_POST['classe'])) {
        $classe = $_POST['classe'];
    } else {
        $classe = 'Non specificato';
    }
    
    if (isset($_POST['data_nascita'])) {
        $data_nascita = $_POST['data_nascita'];
    } else {
        $data_nascita = 'Non specificato';
    }

    // Stampa dei valori ricevuti
    echo "<h1>Valori inviati:</h1>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Cognome:</strong> $cognome</p>";
    echo "<p><strong>Sesso:</strong> $sesso</p>";
    echo "<p><strong>Classe:</strong> $classe</p>";
    echo "<p><strong>Data di Nascita:</strong> $data_nascita</p>";
}
?>

</body>
</html>

