<?php

use Soap\Url;

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
    <form action="index.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    if ($_SESSION['username'] == "admin" && $_SESSION['password'] == "admin") {
        header("Location: home.php");
    } else {
        echo "Invalid username or password";
    }
}
