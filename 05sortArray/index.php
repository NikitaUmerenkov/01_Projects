<?php

function bubbleSort(&$array) {
    $length = count($array);
    
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
}
// Пример двумерного массива
$array = [
    [9, 5, 2, 7],
    [3, 1, 8, 4],
    [6, 0, 2, 9]
];
// Сортировка каждого вложенного массива
foreach ($array as &$subArray) {
    bubbleSort($subArray);
}
// Вывод отсортированного массива
foreach ($array as $subArray) {
    echo implode(', ', $subArray) . "\n";
}


?>



<!-- Результат выполнения данного кода будет:
2, 5, 7, 9
1, 3, 4, 8
0, 2, 6, 9 -->