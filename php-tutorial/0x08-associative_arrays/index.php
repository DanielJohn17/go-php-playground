<?php
$numbers = array("one" => 1, "two" => 2, "three" => 3);

$numbers["four"] = 4;

$values = array_values($numbers);

echo "values: {$values}<br>";

foreach ($numbers as $key => $value) {
    echo "{$key} = {$value} <br>";
}

var_dump($numbers);

echo "Count: " . count($numbers) . "<br>";
