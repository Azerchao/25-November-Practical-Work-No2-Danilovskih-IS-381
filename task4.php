<?php
// Задача 4. Сортировка и вложенные fn
$students = [
    ['name' => 'Анна',  'grade' => 4.5],
    ['name' => 'Борис', 'grade' => 3.2],
    ['name' => 'Вера',  'grade' => 4.8],
    ['name' => 'Глеб',  'grade' => 2.9],
];

// 1. Рейтинг по убыванию оценки
$rating = $students;
usort($rating, fn($a, $b) => $b['grade'] <=> $a['grade']);
foreach ($rating as $i => $s) {
    echo ($i + 1) . ". {$s['name']} — {$s['grade']}\n";
}

// 2. По алфавиту (копия)
$alpha = $students;
usort($alpha, fn($a, $b) => strcmp($a['name'], $b['name']));
echo implode(', ', array_map(fn($s) => $s['name'], $alpha)), "\n";

// 3. Вложенная fn
$greaterThan = fn($limit) => fn($student) => $student['grade'] > $limit;
$good = array_filter($students, $greaterThan(4.0));
echo implode(', ', array_map(fn($s) => $s['name'], $good)), "\n"; // Анна, Вера

// 4. Количество
echo "Количество: ", count($good), "\n"; // 2
