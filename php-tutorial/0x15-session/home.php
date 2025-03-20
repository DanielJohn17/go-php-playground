<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to the home page</h1>
    <input href="index.php">Logout</a>
</body>

</html>

<?php
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: index.php");
}

if ($_SESSION['username'] != "admin" || $_SESSION['password'] != "admin") {
    header("Location: index.php");
}
