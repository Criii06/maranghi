<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <form method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="date" name="data">
        <button type="submit">Login</button>
    </form>
<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data = $_POST['data'];
    if ($username === 'paolo' && $password === 'rossi') {
        echo 'Ciao Paolo, la data è: '.$data;
    } else {
        echo 'Credenziali errate';
    }
}
?>
<script>
    
</script>
</body>
</html>