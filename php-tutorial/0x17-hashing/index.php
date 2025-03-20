<?php

$password = "password";

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password: $password <br>";
echo "Hashed Password: $hash <br>";

if (password_verify($password, $hash)) {
    echo "Password is correct";
} else {
    echo "Password is incorrect";
}
