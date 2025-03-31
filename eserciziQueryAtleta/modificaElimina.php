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

     //$sqlAggiorna = "
     //UPDATE Atleti
     //SET Atleti.nome =". $nuovoNome.", Atleti.cognome=".$nuovoCognome.", Atleti.nazione=".$nuovoNazione."
     //WHERE atleti.id_atleta =". $_POST;


     //$sqlElimina = "
     //DELETE FROM Atleti
     //WHERE Atleti.id_atleta =".$_POST["atleta"];
     //echo $sql;

     $sql = "
     SELECT Atleti.nome, Atleti.cognome, Atleti.nazione
     FROM Atleti
     WHERE Atleti.id_atleta = $_POST[atleta]
     ";

     $result = mysqli_query($conn, $sql);
     $riga=mysqli_fetch_assoc($result);
     print_r($riga);
/*
     <form action="modificaElimina.php" method="post">
    <label >Nuovo Nome</label>
    <input type="text" name="nuovoNome"  value="<?php echo isset($_POST['nome']); ?>">

    <label for="nuovoCognome">Nuovo Cognome</label>
    <input type="text" name="nuovoCognome" value="<?php echo isset($_POST['cognome']) ? htmlspecialchars($_POST['nuovoCognome']) : ''; ?>">

    <label>Nuovo Nazionalita</label>
    <input type="text" name="nuovoNazione"  value="<?php echo isset($_POST['nazione']) ? htmlspecialchars($_POST['nuovoNazione']) : ''; ?>">

    <label >ID Atleta </label>
    <input type="text" name="atleta" value="<?php echo ($_POST['id_atleta']); ?>">

    <input type="submit" value="Aggiorna o Elimina">
</form>
     print_r ($result);
*/

     mysqli_close($conn);

    ?>
</body>
</html>
