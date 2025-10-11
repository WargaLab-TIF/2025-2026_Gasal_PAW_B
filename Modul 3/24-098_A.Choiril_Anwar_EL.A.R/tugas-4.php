<?php
// di soal
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

// nambah 5 data
$height += array(
    "Riel" => "180",
    "EL" => "175",
    "Ruel" => "160",
    "Sherin" => "178",
    "Jeki" => "172"
);
echo "Data tinggi badan setelah penambahan:<br>";
// perulangan foreach seperti di soal
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
// soal : Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan seperit di soal?
// jawaban : tidak perlu, perulangan foreach bersifat dinamis yg secara otomatis membaca seluruh elemen dan memang cocok untuk array asosiatif berbeda dari for yg harus count().

$weight = array("Riel"=>"70", "Ruel"=>"60", "EL"=>"65");
foreach($weight as $y => $y_value) {
    echo "Key=" . $y . ", Value=" . $y_value;
    echo "<br>";

// soal : dengan menggunakan stuktur perulangan FOR! apakah Anda membuat skrip baru untuk menampilkan seluruh array $weight ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada?
// jawab : cukup sedikit memodifikasi skrip yang sudah ada pada soal, dengan membuat variabel untuk menampilkan panjang array yg kita buat dan melakukan perulangan yg sama seperti di soal hanya saja menggunakan variabel yg kita buat.
}



?>