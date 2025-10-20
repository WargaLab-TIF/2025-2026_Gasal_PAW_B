<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}

echo "<hr>";
/*
1.Menambahkan lima data baru dalam array $height! Apakah Anda perlu melakukan
perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #4 – #7)
untuk menampilkan seluruh data dalam array $height dengan adanya penambahan
lima data baru? Mengapa demikian? Jelaskan!
*/
$height["Rizki"] = "160";
$height["Budi"] = "165";        
$height["Rozi"] = "166";
$height["Zakaria"] = "170";
$height["Syadat"] = "160";

echo "1.Data height setelah ditambah:<br>";
foreach($height as $x => $value) {
    echo "key= " . $x . ", Value = " . $value;
}

echo "<br>";
echo "<hr>";

/*
2.Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan
seluruh data dari array $weight dengan menggunakan stuktur perulangan FOR!
Apakah Anda membuat skrip baru untuk menampilkan seluruh array $weight
ataukah Anda cukup sedikit memofikasi skrip yang sudah ada? Mengapa demikian?
Jelaskan!
*/

$weight = array("Budi"=>"60", "Rizki"=>"90", "Rozi"=>"55");

echo "<b>Data berat badan(weight):</b>";
echo "<br>";
foreach($weight as $y => $value){
    echo "key= " . $y . ", Value = " . $value;
    echo "<br>";
}
?>

