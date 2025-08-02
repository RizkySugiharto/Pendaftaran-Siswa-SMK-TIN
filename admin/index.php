<?php
session_start();
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en" id="loginphp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIN</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/croc" rel="stylesheet">

</head>
<body>
    <div class="blue"></div>

<form action="">
    <div class="imagegroup">
        <img src="img/logo tin.png" alt="">
        <img src="img/logo yayasan tin.png" alt="">
    </div>
    <h2>SIGN IN</h2>
    <div class="inputgroup">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    </div>
    <div class="inputgroup">
    <label for="password">Password</label>
    <input type="text" name="password" id="password">
    </div>
    <input type="submit" value="Login" class="button">
    <a href="dashboard.php">Butuh Bantuan?</a>
</form>

</body>
</html>
