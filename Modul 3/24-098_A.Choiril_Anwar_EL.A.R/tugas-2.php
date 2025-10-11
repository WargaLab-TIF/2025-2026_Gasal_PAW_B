<?php
// disoal nya
    $fruits = array("Avocado", "Blueberry", "Cherry");
// panjang array sebelum tambah data
    echo count($fruits);
    array_push($fruits, "Durian", "Elderberry","Apel","Mangga","Jeruk");
// panjang array setelah tambah data
    $arrlength = count($fruits);
    echo "<br> $arrlength <br>";
    for($x = 0; $x < $arrlength; $x++) {
        echo $fruits[$x];
        echo "<br>";
    }
// soal: apakah perlu melakukan perubahan pada skrip penggunaan struktur perulangan for untuk menampilkan seluruh data?
// jawab: tidak perlu, karena fungsi count itu untuk menghitung panjang array yg bakalan otomatis sesuai dengan jumlah data yang ada.

echo "<br>";
//buat array baru isinya 3 data
$vegies = array("Bayam", "Kangkung", "Lobak");
//panjang array $vegies
$vegieslength = count($vegies);
//nampilkan data dengan memodifikasi skrip sebelumnya
for($i = 0; $i < $vegieslength; $i++) {
    echo $vegies[$i];
    echo "<br>";
}
// soal : dengan menggunakan stuktur perulangan FOR! apakah Anda membuat skrip baru untuk menampilkan seluruh array $vegies ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada?
// jawab : cukup sedikit memodifikasi skrip yang sudah ada pada soal, dengan membuat variabel untuk menampilkan panjang array yg kita buat dan melakukan perulangan yg sama seperti di soal hanya saja menggunakan variabel yg kita buat.
?>