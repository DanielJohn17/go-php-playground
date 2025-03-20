<?php

setcookie('name', 'value', time() + 3600, '/');
echo 'The cookie has been set.';

foreach ($_COOKIE as $key => $value) {
    echo '<br>' . $key . ' = ' . $value;
}

// delete the cookie
// setcookie('name', '', time() - 3600, '/');
