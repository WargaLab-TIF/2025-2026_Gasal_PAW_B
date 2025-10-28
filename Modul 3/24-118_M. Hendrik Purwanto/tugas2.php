<?php

$fruits = array("Avocado", "Blueberry", "Cherry");

$newFruits = array("Durian", "Mango", "Papaya", "Apple", "Melon");

for ($i = 0; $i < count($newFruits); $i++) {
    $fruits[] = $newFruits[$i]; 
}

$arrlength = count($fruits);
echo "<b>Data dalam array \$fruits:</b><br><hr>";
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

$vegies = array("Carrot", "Broccoli", "Spinach");
$arrlength2 = count($vegies);
echo "<br><b>Data dalam array \$vegies:</b><br><hr>";
for ($y = 0; $y < $arrlength2; $y++) {
    echo $vegies[$y] . "<br>";
}

echo "<br><hr><b>Jawaban 1:</b><br>";
echo "Jumlah data dalam array \$fruits saat ini adalah " . $arrlength . " elemen.<br>";
echo "Tidak perlu melakukan perubahan pada struktur perulangan FOR (baris #5–#8), ";
echo "karena variabel \$arrlength dihitung menggunakan fungsi count(), yang otomatis menyesuaikan jumlah elemen array. ";
echo "Jadi ketika lima data baru ditambahkan, perulangan tetap menampilkan semua data tanpa perlu diubah.<br><br>";

echo "<b>Jawaban 2:</b><br>";
echo "Tidak perlu membuat skrip baru untuk menampilkan seluruh array \$vegies. ";
echo "Cukup memodifikasi sedikit bagian skrip sebelumnya, yaitu mengganti nama variabel dari \$fruits menjadi \$vegies. ";
echo "Hal ini karena struktur perulangan FOR sama dan dapat digunakan untuk menampilkan isi dari array apa pun.";
?>
