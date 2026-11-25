<?php
// Задача 1. Синтаксис fn
$square = fn($x) => $x * $x;
$isEven = fn(int $n): bool => $n % 2 === 0;
$greet  = fn(string $name): string => "Привет, $name!";
$max    = fn($a, $b) => $a > $b ? $a : $b;

echo $square(4), "\n";   // 16
echo $square(7), "\n";   // 49
echo var_export($isEven(10), true), "\n"; // true
echo var_export($isEven(7), true), "\n";  // false
echo $greet('Анна'), "\n";
echo $greet('Олег'), "\n";
echo $max(3, 8), "\n";   // 8
echo $max(15, 2), "\n";  // 15

// Классический вид функции $square:
// $square = function ($x) {
//     return $x * $x;
// };
// fn-версия короче: нет слова function, фигурных скобок и return.
