<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form method="post" action="utenti.php">
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
        $database = "fagiani_utenti";

        $conn = mysqli_connect($servername, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM utenti WHERE nome = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($riga = mysqli_fetch_assoc($result)) {
                echo "<pre>";
                print_r($riga);
                echo "</pre>";
            }
            echo "Benvenuto, $username!";
        } else {
            echo "Credenziali non valide. Riprova.";
        }
    }
    ?>

</body>
</html>
