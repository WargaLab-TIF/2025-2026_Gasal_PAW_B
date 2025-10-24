<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";


//no1
//menambahkan 5 data baru
$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "177";
$height["Harry"] = "169";

echo "Daftar Tinggi Badan:";
foreach ($height as $name => $value) {
    echo "$name is $value cm tall.<br>";
}

$lastKey = array_key_last($height);

echo "<br>Nilai dengan indeks terakhir: " . $height[$lastKey] . " cm";
echo "<br>Indeks terakhir (nama): " . $lastKey;

//no2

unset($height["Charlie"]);

echo "<br><br>";
echo "Daftar Tinggi Badan Setelah Dihapus: <br>";
foreach ($height as $name => $value) {
    echo "$name is $value cm tall.<br>";
}

$lastKey = array_key_last($height);

echo "<br>Nilai dengan indeks terakhir: " . $height[$lastKey] . " cm";
echo "<br>Indeks terakhir (nama): " . $lastKey;

//array baru
$weight = array(55, 62, 70);

// Menampilkan seluruh data untuk memastikan isi array
echo "<h3>Daftar Berat Badan:</h3>";
for ($i = 0; $i < count($weight); $i++) {
    echo "Data ke-" . ($i + 1) . " = " . $weight[$i] . " kg<br>";
}

echo "<br><b>Data kedua dari array \$weight adalah:</b> " . $weight[1] . " kg";
?>


