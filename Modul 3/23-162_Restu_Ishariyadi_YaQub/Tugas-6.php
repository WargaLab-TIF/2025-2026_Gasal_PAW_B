<?php
// array_push()
$hewan = ["Ayam", "Bebek"];
array_push($hewan, "Cicak");
echo "<h2>1. array_push()</h2>";
print_r($hewan);
echo "<hr>";

// array_merge()
$sayur = ["Wortel", "Bayam"];
$gabungan = array_merge($hewan, $sayur);
echo "<h2>2. array_merge()</h2>";
print_r($gabungan);
echo "<hr>";

// array_values()
$data_assoc = ["nama"=>"Budi", "umur"=>20];
$nilai_saja = array_values($data_assoc);
echo "<h2>3. array_values()</h2>";
print_r($nilai_saja);
echo "<hr>";

// array_search()
$posisi = array_search("Bayam", $gabungan);
echo "<h2>4. array_search()</h2>";
echo "Nilai 'Bayam' ditemukan di indeks: " . $posisi;
echo "<hr>";

// array_filter()
$angka = [1, 2, 3, 4, 5, 6];
$angka_genap = array_filter($angka, function($n){ return $n % 2 == 0; });
echo "<h2>5. array_filter() (hanya angka genap)</h2>";
print_r($angka_genap);
echo "<hr>";

// sorting
$buah = ["Mangga", "Apel", "Jeruk"];
echo "<h2>6. Fungsi Sorting</h2>";
echo "Array buah awal: "; print_r($buah); echo "<br>";
sort($buah);
echo "Setelah sort(): "; print_r($buah);
echo "<hr>";
?>