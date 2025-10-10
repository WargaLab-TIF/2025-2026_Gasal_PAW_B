<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "177";
$height["Henry"] = "169";

echo "<b>Data tinggi badan (array \$height):</b><br>";
foreach($height as $x => $x_value) {
    echo "Key = " . $x . ", Value = " . $x_value . "<br>";
}

echo "<br><b>Jawaban 1:</b><br>";
echo "Tidak perlu melakukan perubahan pada struktur perulangan FOREACH. ";
echo "Hal ini karena FOREACH otomatis membaca seluruh pasangan key dan value ";
echo "dalam array, berapa pun jumlah data yang ditambahkan.<br><br>";

$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"68");

echo "<b>Data berat badan (array \$weight):</b><br>";
foreach($weight as $y => $y_value) {
    echo "Key = " . $y . ", Value = " . $y_value . "<br>";
}

echo "<br><b>Jawaban 2:</b><br>";
echo "Tidak perlu membuat skrip baru. Cukup memodifikasi sedikit bagian variabel ";
echo "dengan mengganti \$height menjadi \$weight, karena struktur FOREACH yang digunakan ";
echo "tetap sama untuk menampilkan seluruh isi array.";
?>
