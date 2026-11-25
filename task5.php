<?php
// Задача 5. Анализ заказов
$orders = [
    ['id' => 1, 'customer' => 'Иван',  'total' => 1200, 'status' => 'done'],
    ['id' => 2, 'customer' => 'Мария', 'total' => 800,  'status' => 'new'],
    ['id' => 3, 'customer' => 'Пётр',  'total' => 3500, 'status' => 'done'],
    ['id' => 4, 'customer' => 'Анна',  'total' => 600,  'status' => 'cancelled'],
    ['id' => 5, 'customer' => 'Олег',  'total' => 2100, 'status' => 'done'],
];

$isDone = fn($o) => $o['status'] === 'done';
$done   = array_filter($orders, $isDone);

// 1. Выручка по выполненным
$revenue = array_reduce($done, fn($sum, $o) => $sum + $o['total'], 0);
echo "Выручка (done): $revenue руб.\n"; // 6800

// 2. Заказы свыше 1000
echo "Заказы свыше 1000 руб.:\n";
$big = array_map(
    fn($o) => "Заказ №{$o['id']} — {$o['total']} руб. ({$o['customer']})",
    array_filter($orders, fn($o) => $o['total'] > 1000)
);
foreach ($big as $line) echo "  $line\n";

// 3. Самый дорогой выполненный
$sorted = array_values($done);
usort($sorted, fn($a, $b) => $b['total'] <=> $a['total']);
$top = $sorted[0];
echo "Самый дорогой выполненный: №{$top['id']} — {$top['total']} руб. ({$top['customer']})\n";

// 4. Клиенты без дубликатов
$names = array_values(array_unique(array_map(fn($o) => $o['customer'], $orders)));
echo "Клиенты: ", implode(', ', $names), "\n";

// 5. Статистика
$countBy = fn($status) => count(array_filter($orders, fn($o) => $o['status'] === $status));
echo "Всего заказов: ", count($orders), "\n";
echo "Выполнено: ", $countBy('done'), "\n";
echo "Отменено: ", $countBy('cancelled'), "\n";
echo "Сумма выручки: $revenue руб.\n";
