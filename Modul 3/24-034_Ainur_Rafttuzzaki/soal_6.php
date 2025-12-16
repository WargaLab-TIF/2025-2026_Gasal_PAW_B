<?php
$warna1 = array("Blue", "Orange", "Pink");
$warna2 = array("White", "Grey", "Brown");

echo "1. array_push() <br>";
array_push($warna1, "Black", "Red");
print_r($warna1);
echo "<br><br>";

echo "2. array_merge() <br>";
$gabungan = array_merge($warna1, $warna2);
print_r($gabungan);
echo "<br><br>";

echo "3. array_values() <br>";
$nilai = array_values($gabungan);
print_r($nilai);
echo "<br><br>";

echo "4. array_search() <br>";
$cari = array_search("Grey", $gabungan);
if ($cari !== false) {
    echo "Warna 'Grey' ditemukan pada indeks ke-$cari <br><br>";
} else {
    echo "Warna tidak ditemukan.<br><br>";
}

echo "5. array_filter() <br>";
$hasilFilter = array_filter($gabungan, function($warna) {
    return strlen($warna) % 2 == 0;
});
print_r($hasilFilter);
echo "<br><br>";

echo "6. Fungsi sorting <br>";

$asc = $gabungan;
sort($asc);
echo "sort() ascending: ";
print_r($asc);
echo "<br>";

$desc = $gabungan;
rsort($desc);
echo "rsort() descending: ";
print_r($desc);
echo "<br>";

$asos = $gabungan;
asort($asos);
echo "asort() (menjaga key): ";
print_r($asos);
echo "<br>";

$aras = $gabungan;
arsort($aras);
echo "arsort() (menjaga key): ";
print_r($aras);
echo "<br>";
?>