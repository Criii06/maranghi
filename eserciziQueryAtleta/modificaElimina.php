<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="modificaElimina.php" method="post">

    <label>nuovo nome</label>
    <input type="text" name="nuovoNome">
    <label>nuovo cognome</label>
    <input type="text" name="nuovoCognome">
    <label>nuovo nazionalita</label>
    <input type="text" name="nuovoNazione">
    <input type="submit"> $sqlElimina


</form>

    <?php
     $servername = "10.1.0.52";
     $db_username = "fagiani";
     $db_password = "fagiani";
     $database = "fagiani_gareAtleti";
     
     $conn = mysqli_connect($servername, $db_username, $db_password, $database);

     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }

     $sqlAggiorna = "
     UPDATE Atleti
     SET Atleti.nome =". $nuovoNome.", Atleti.cognome=".$nuovoCognome.", Atleti.nazione=".$nuovoNazione."
     WHERE atleti.id_atleta =". $_POST;


     $sqlElimina = "
     DELETE FROM Atleti
     WHERE Atleti.id_atleta =".$_POST["atleta"];
     echo $sql;

     $result = mysqli_query($conn, $sql);



     mysqli_close($conn);

    ?>
</body>
</html>
