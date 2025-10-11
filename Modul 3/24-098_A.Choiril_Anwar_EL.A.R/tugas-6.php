<?php
// Data awal
$data = array("Riel", "EL");
echo "Data awal:<br>";
foreach ($data as $item) {
    echo "$item<br>";
}
echo "<br>";

//array_push()
$tambah = $data;
array_push($tambah, "Ruel", "Yami", "Pharaoh");
echo "1. Setelah array_push():<br>";
foreach ($tambah as $nama) {
    echo "$nama<br>";
}
echo "<br>";

//array_merge()
$baru = array("MAM", "RAWR", "BANG JAGO");
$gabung = array_merge($tambah, $baru);
echo "2. Setelah array_merge() (gabung dengan array baru):<br>";
foreach ($gabung as $nama) {
    echo "$nama<br>";
}
echo "<br>";

//array_values()
$nilai = array_values($gabung);
echo "3. Setelah array_values():<br>";
foreach ($nilai as $nama) {
    echo "$nama<br>";
}
echo "<br>";

//array_search()
$cari = array_search("EL", $nilai);
echo "4. Hasil array_search('EL'): Index ke-$cari<br>";
echo "<br>";

//array_filter()
$filter = array_filter($nilai, function($bebas){
    return strlen($bebas) > 5; 
});
echo "5. Setelah array_filter() (panjang > 5 huruf):<br>";
foreach ($filter as $nama) {
    echo "$nama<br>";
}
echo "<br>";

//Sorting
$urutAZ = $nilai;
sort($urutAZ);
echo "6a. Setelah sort() (A-Z):<br>";
foreach ($urutAZ as $nama) {
    echo "$nama<br>";
}
echo "<br>";

$urutZA = $nilai;
rsort($urutZA);
echo "6b. Setelah rsort() (Z-A):<br>";
foreach ($urutZA as $nama) {
    echo "$nama<br>";
}
?>