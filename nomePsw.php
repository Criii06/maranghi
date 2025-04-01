<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="login" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>

    <?php
    if (isset($_COOKIE['log']) && $_COOKIE['log'] == "Loggato") {
        echo 'Ciao Paolo';
        echo "<script>document.getElementById('login').style.display = 'none';</script>";
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username === 'paolo' && $password === 'rossi') {
                setcookie("log", "Loggato", time() + 30, "/");
            } else {
                echo 'Credenziali errate';
            }
        }
    }
    ?>
</body>
</html>
