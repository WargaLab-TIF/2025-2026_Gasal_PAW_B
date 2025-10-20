<?php
echo "<h2>3.3.6 Eksplorasi Lebih Lanjut terhadap Array</h2>";

echo "<h3>1. Implementasi fungsi array_push()</h3>";
$buah = array("Apple", "Banana", "Cherry");
array_push($buah, "Durian", "Mango"); 
print_r($buah);
echo "<hr>";

echo "<h3>2. Implementasi fungsi array_merge()</h3>";
$buah1 = array("Apple", "Banana");
$buah2 = array("Mango", "Orange");
$allbuah = array_merge($buah1, $buah2); 
print_r($allbuah);
echo "<hr>";

echo "<h3>3. Implementasi fungsi array_values()</h3>";
$saya = array("nama"=>"Rizki", "umur"=>19, "kota"=>"Nganjuk");
$values = array_values($saya);
print_r($values);
echo "<hr>";

echo "<h3>4. Implementasi fungsi array_search()</h3>";
$warna = array("Merah", "Biru", "Hijau", "Kuning");
$search = array_search("Hijau", $warna);
echo "Warna Hijau ditemukan pada indeks: ke-$search";
echo "<hr>";

echo "<h3>5. Implementasi fungsi array_filter()</h3>";
$angka = array(1, 2, 3, 4, 5, 6);
$filter = array_filter($angka, function($x) {
    return $x % 2 == 0; 
});
print_r($filter);
echo "<hr>";

echo "<h3>6. Implementasi fungsi Sorting pada array</h3>";
$angka2 = array(5, 3, 8, 1, 2);
echo "Sebelum sorting: ";
print_r($angka2);

// Mengurutkan array secara ascending
sort($angka2);
echo "<br>Setelah sorting ascending: ";
print_r($angka2);

// Mengurutkan array secara descending
rsort($angka2);
echo "<br>Setelah sorting descending: ";
print_r($angka2);
echo "<hr>";

//assort dan ksort
$assoc = array("Rizki"=>19, "Budi"=>21, "Andi"=>20);
asort($assoc);
echo "Setelah sorting ascending berdasarkan value: ";
print_r($assoc);
echo "<br>";
ksort($assoc);
echo "Setelah sorting ascending berdasarkan key: ";
print_r($assoc);
echo "<br>";

?>