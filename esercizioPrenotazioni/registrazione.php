<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
</head>
<body>
    <form action="registrazione.php" method="post">
        <label>Nome</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="Registrati">
    </form>

    <?php
    include "conn.php";

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO utenti (nome, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            echo "Errore: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
