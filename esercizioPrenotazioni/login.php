<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>

    <?php
    include "conn.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM utenti WHERE nome = '$username' AND PASSWORD = '$password'";
        $result = mysqli_query($conn, $sql);

        session_start();

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['autenticato'] = true;
            $_SESSION['id'] = $row['id'];
            header("Location: menu.php");
            exit;
        } else {
            echo "Credenziali non valide. Riprova.";
        }
    }
    ?>
</body>
</html>
