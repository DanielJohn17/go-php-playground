<?php
$name = "Daniel John";
$food = "pizza";

$age   = 21;
$users = 2;

$gpa = 3.5;
$price = 4.99;
$quantity = 4;

$employed = true;
$online = false;

$total = $price * $quantity;

echo "Hello {$name}<br />";
echo "You like {$food}<br />";

echo "You are {$age} years old<br />";
echo "There are {$users} users online<br />";

echo "Your gpa is {$gpa}<br />";
echo "Your pizza is \${$price}<br />";

echo "Employed status: {$employed}<br />";
echo "Online status: {$online}<br />";

echo "<br />You have orderd {$quantity} x of {$food}s<br />";
echo "Total price of {$food} is \${$total}<br />";
