<?php
// Задача 3. Обработка массива товаров
$products = [
    ['title' => 'Книга',    'price' => 500],
    ['title' => 'Рюкзак',   'price' => 2500],
    ['title' => 'Кружка',   'price' => 350],
    ['title' => 'Наушники', 'price' => 4200],
    ['title' => 'Блокнот',  'price' => 150],
];

// 1. Строки «Книга — 500 руб.»
$lines = array_map(fn($p) => "{$p['title']} — {$p['price']} руб.", $products);
print_r($lines);

// 2. Товары дороже 1000
$expensive = array_filter($products, fn($p) => $p['price'] > 1000);
print_r(array_map(fn($p) => $p['title'], $expensive)); // Рюкзак, Наушники

// 3. Общая стоимость
$total = array_reduce($products, fn($sum, $p) => $sum + $p['price'], 0);
echo "Общая стоимость: $total руб.\n"; // 7700

// 4. Скидка 15%
$discounted = array_map(fn($p) => array_merge($p, ['price' => $p['price'] * 0.85]), $products);
print_r($discounted);
