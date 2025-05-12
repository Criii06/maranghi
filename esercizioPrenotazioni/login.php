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

    <a href="registrazione.php">torna a registrazione</a>

    <?php
    include "conn.php";
    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT utenti.password FROM utenti WHERE nome = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION['autenticato'] = true;
                $_SESSION['username'] = $username;
                header("Location: menu.php");
                exit();
            } else {
                echo "Credenziali non valide. Riprova.";
            }
        } else {
            echo "Credenziali non valide. Riprova.";
        }
    }
    ?>
</body>
</html>
