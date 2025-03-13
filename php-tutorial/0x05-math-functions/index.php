<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <label>x:</label>
        <input type="text" name="x">

        <label>y:</label>
        <input type="text" name="y">

        <label>radius:</label>
        <input type="text" name="radius">
        <input type="submit" value="total">
    </form>
</body>

</html>

<?php
$x = $_POST["x"];
$y = $_POST["y"];
$radius = $_POST["radius"];

$abs = abs($x);
$round = round($x);
$floor = floor($x);
$ceil = ceil($x);

$pow = pow($x, $y);
$sqrt = sqrt($x);

$max = max($x, $y);
$min = min($x, $y);

$area = null;
$circumference = null;

echo "x: {$x}<br>";
echo "y: {$y}<br>";
echo "abs: {$abs}<br>";
echo "round: {$round}<br>";
echo "floor: {$floor}<br>";
echo "ceil: {$ceil}<br>";

echo "x raised to y = {$pow}<br>";
echo "Sqrt of x = {$sqrt}<br>";

echo "Maximum of x and y is: {$max}<br>";
echo "Minimum of x and y is: {$min}<br>";


$area = pi() * pow($radius, 2);
$circumference = 2 * pi() * $radius;

$area = round($area, 2);
$circumference = round($circumference, 2);

echo "<br>-----Area and Circumference of the circle-----<br>";
echo "Area = {$area}cm^2 <br>";
echo "Circumference = {$circumference}cm <br>";
