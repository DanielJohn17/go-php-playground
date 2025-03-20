<?php

$username = strtolower('JohnDoe');
$phone = '123 456 7890';

echo $username . "<br />";
echo strtoupper($username) . "<br />";

$trimmed = trim('  Hello, World!  ');
echo $trimmed . "<br />";

$replaced = str_replace(' ', '-', $phone);
echo $replaced . "<br />";

$padded = str_pad('Hello', 10, '/', STR_PAD_BOTH);
echo $padded . "<br />";

$reversed = strrev('Hello, World!');
echo $reversed . "<br />";

$shuffled = str_shuffle('Hello, World!');
echo $shuffled . "<br />";

// Compare strings
$compare = strcmp('Hello', 'hello');
echo $compare . "<br />";
$compare = strcmp('hello', 'Hello');
echo $compare . "<br />";
$compare = strcasecmp('Hello', 'Hello');
echo $compare . "<br />";

// length of a string
$length = strlen('Hello, World!');
echo $length . "<br />";

$position = strpos('Hello, World!', 'World');
echo $position . "<br />";

// Substring
$parent_str = 'Hello, World!';
$position = strpos($parent_str, ' ');
$substring = substr($parent_str, $position);
echo $substring . "<br />";

// explode
$words = explode(' ', 'Hello, World!');
print_r($words);
echo "<br />";

// implode
$words = ['Hello', 'World!'];
$sentence = implode(' ', $words);
echo $sentence . "<br />";


// split
$words = preg_split('/\s+/', 'Hello, World!');
print_r($words);
