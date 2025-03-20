<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label>Username:</label><br />
        <input type="text" name="username" /><br />

        <label>Age:</label><br />
        <input type="text" name="age" /><br />

        <label>Email:</label><br />
        <input type="text" name="email" /><br />

        <input type="submit" name="login" value="Submit" />
    </form>
</body>

</html>
<?php
if (isset($_POST['login'])) {
    // sanitize inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    // $username = $_POST['username'];
    echo $username . "<br />";

    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    // $age = $_POST['age'];
    echo $age . "<br />";

    // Validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    // $email = $_POST['email'];
    if (empty($email)) {
        echo "Invalid email address";
    } else {
        echo $email . "<br />";
    }
}
