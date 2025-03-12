<?php
$x = 10;
$y = 2;
$z = null;
$counter = 0;


$z = $x + $y;
echo $z, "<br />";

$z = null;

$z = $x - $y;
echo $z, "<br />";

$z = $x * $y;
echo $z, "<br />";

$z = null;

$z = $x / $y;
echo $z, "<br />";

$z = null;

$z = $x ** $y;
echo $z, "<br />";

$z = null;

$z = $x % $y;
echo $z, "<br />";

$counter++;
echo "Counter after increment: {$counter}<br />";

$counter--;
echo "Counter after decrement: {$counter}<br />";

$counter += 3;
echo "Counter after +3 increment: {$counter}<br />";

$counter -= 3;
echo "Counter after -3 decrement: {$counter}<br />";
