<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <H1>lOGIN LIBRERIA</H1>

      <form method="post" action="loginLibreria.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>

    <?php

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $servername = "10.1.0.52";
        $db_username = "fagiani";
        $db_password = "fagiani";
        $database = "fagiani_libreria";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM utenti WHERE nome = '$username' AND PASSWORD = '$password'";

        $result = mysqli_query($conn, $sql);

        $risultato = mysqli_fetch_assoc($result);
        $permessi = $risultato["tipo"];
        setcookie("permessi", $permessi, time() + 3600, "/");

        if (mysqli_num_rows($result) > 0) {
          header("location:menuLibreria.php");
        } else {
            echo "Credenziali non valide. Riprova.";
        }
    }
    ?>
</body>
</html>