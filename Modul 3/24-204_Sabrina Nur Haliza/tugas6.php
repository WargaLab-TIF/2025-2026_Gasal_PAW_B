<?php
//1. array_push()
echo "<h3>1. fungsi array_push()</h3>";
$fruits = array("apple", "banana", "cherry");
array_push($fruits, "durian", "mango");
echo "hasil setelah array_push():<br>";
foreach ($fruits as $item) {
	echo $item. "<br>";
}

//2. array_merge()
echo "<h3>2. fungsi array_merge()</h3>";
$vegies = array("carrot", "tomato");
$mix = array_merge($fruits, $vegies); // Menggabungkan dua array
echo "Hasil setelah array_merge():<br>";
foreach ($mix as $item) {
    echo $item . "<br>";
}

//3. array_values
echo "<h3>3. Fungsi array_values()</h3>";
$height = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);
$height_values = array_values($height); // Mengambil semua nilai (tanpa key)
echo "Nilai dari array \$height:<br>";
foreach ($height_values as $val) {
    echo $val . " cm<br>";
}

//4. array_search()
echo "<h3>4. Fungsi array_search()</h3>";
$search_name = array_search(170, $height); // Mencari key berdasarkan nilai
echo "Tinggi 170 dimiliki oleh: " . $search_name . "<br>";

//5. array_filter()
echo "<h3>5. Fungsi array_filter()</h3>";
$numbers = array(10, 25, 30, 45, 50, 5);
$filtered = array_filter($numbers, function($num) {
    return $num > 20; // Hanya ambil angka > 20
});
echo "angka lebih dari 20:<br>";
foreach ($filtered as $num) {
	echo $num . "<br>";
}

//6. Fungsi sorting (sort, rsort, asort, ksort, arsort, krsort)
echo "<h3>6. Fungsi Sorting</h3>";

$data = array("Andy" => 176, "Barry" => 165, "Charlie" => 170);

echo "<b>a. sort()</b> (urut nilai tanpa mempertahankan key)<br>";
$nums = array(5, 2, 9, 1, 7);
sort($nums);
print_r($nums);
echo "<br><br>";

echo "<b>b. rsort()</b> (urut nilai dari besar ke kecil)<br>";
$nums = array(5, 2, 9, 1, 7);
rsort($nums);
print_r($nums);
echo "<br><br>";

echo "<b>c. asort()</b> (urut berdasarkan nilai, pertahankan key)<br>";
asort($data);
print_r($data);
echo "<br><br>";

echo "<b>d. ksort()</b> (urut berdasarkan key A-Z)<br>";
ksort($data);
print_r($data);
echo "<br><br>";

echo "<b>e. arsort()</b> (urut nilai besar ke kecil, pertahankan key)<br>";
arsort($data);
print_r($data);
echo "<br><br>";

echo "<b>f. krsort()</b> (urut key Z-A)<br>";
ksort($data);
print_r($data);
echo "<br><br>";
?>