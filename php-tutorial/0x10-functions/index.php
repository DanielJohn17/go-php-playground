<?php
function hello_world()
{
    echo 'Hello, World!';
}

function add(float $a, float $b)
{
    return $a + $b;
}

function greeting(string $name)
{
    return 'Hello, ' . $name . '!';
}

function isEven(int $number)
{
    return $number % 2 === 0;
}

function calculate_hypotenuse(float $a, float $b)
{
    return sqrt($a ** 2 + $b ** 2);
}

echo greeting('John') .  "<br />";
echo add(1, 2) .  "<br />";
hello_world();

$number = 2;

if (isEven($number)) {
    echo "{$number} is Even <br />";
} else {
    echo "{$number} is Odd <br />";
}

echo "Hypotenuse: " . calculate_hypotenuse(3, 4) . "<br />";
