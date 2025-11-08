<?php
//  Bubble Sort

function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Tukar elemen
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

$arr = [64, 34, 25, 12, 22, 11, 90];
print_r(bubbleSort($arr));

echo "<br>";

// Selection Sort

function selectionSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $min_idx = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$min_idx]) {
                $min_idx = $j;
            }
        }
        // Tukar elemen
        $temp = $arr[$min_idx];
        $arr[$min_idx] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

$arr = [64, 25, 12, 22, 11];
print_r(selectionSort($arr));

echo "<br>";

// Insertion Sort

function insertionSort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j = $j - 1;
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

$arr = [12, 11, 13, 5, 6];
print_r(insertionSort($arr));

echo "<br>";