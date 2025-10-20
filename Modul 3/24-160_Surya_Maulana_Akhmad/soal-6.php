<?php

// 1️ array_push()  Menambah elemen ke akhir array
echo "<h3>1. array_push()</h3>";
$fruits = ["Apple", "Banana"];
array_push($fruits, "Mango", "Orange");
print_r($fruits);

echo "<hr>";

// 2️ array_merge() Menggabungkan dua array
echo "<h3>2. array_merge()</h3>";
$array1 = ["Red", "Green"];
$array2 = ["Blue", "Yellow"];
$merged = array_merge($array1, $array2);
print_r($merged);

echo "<hr>";

// 3 array_values() → Mengambil semua nilai dari array asosiatif
echo "<h3>3. array_values()</h3>";
$height = ["Andy" => 176, "Barry" => 165, "Charlie" => 170];
$values = array_values($height);
print_r($values);

echo "<hr>";

// 4️ array_search() → Mencari nilai dalam array dan mengembalikan key-nya
echo "<h3>4. array_search()</h3>";
$key = array_search(170, $height);
echo "Tinggi 170 dimiliki oleh: <b>$key</b>";

echo "<hr>";

// 5️ array_filter() → Menyaring array berdasarkan kondisi tertentu
echo "<h3>5. array_filter()</h3>";
$numbers = [10, 25, 30, 45, 50];
$filtered = array_filter($numbers, function ($num) {
    return $num > 30; // hanya tampilkan angka lebih dari 30
});
print_r($filtered);

echo "<hr>";

// 6️ Fungsi Sorting → Mengurutkan array dengan berbagai cara
echo "<h3>6. Fungsi Sorting pada Array</h3>";

$height = ["Andy" => 176, "Barry" => 165, "Charlie" => 170];

echo "<b> asort()</b> - Urut berdasarkan nilai (ascending)<br>";
asort($height);
print_r($height);

echo "<br><br><b> arsort()</b> - Urut berdasarkan nilai (descending)<br>";
arsort($height);
print_r($height);

echo "<br><br><b> ksort()</b> - Urut berdasarkan key (ascending)<br>";
ksort($height);
print_r($height);

echo "<br><br><b> krsort()</b> - Urut berdasarkan key (descending)<br>";
krsort($height);
print_r($height);

