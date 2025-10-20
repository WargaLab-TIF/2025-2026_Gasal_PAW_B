<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall.";
echo "<br><br>";

// pertanyaan 1
$height = array_merge($height, array(
    "Surya" => "177",
    "Maulana" => "174",
    "Akhmad" => "147",
    "Sayifulloh" => "137",
    "Ajib" => "173"
));

// Tampilkan nilai dengan indeks (key) terakhir
$lastKey = array_key_last($height);
echo "<br><b>Nilai dengan indeks terakhir:</b><br>";
echo "Key: " . $lastKey . " → Value: " . $height[$lastKey] . " cm<br>";

// pertanyaan 2
// Hapus data tertentu 
unset($height["Ajib"]);

// indek terakhir setelah penghapusan
$lastKey = array_key_last($height);
echo "<br><b>Nilai dengan indeks terakhir:</b><br>";
echo "Key: " . $lastKey . " → Value: " . $height[$lastKey] . " cm<br>";

// pertanyaan 3
$weight = array(
    "Sandi" => "65",
    "Morse" => "60",
    "Pramuka" => "45"
);



// Tampilkan data kedua dari array $weight
$keys = array_keys($weight); // ambil semua key
$secondKey = $keys[1]; // ambil key ke-2 (indeks 1)
echo "<br><b>Data kedua dari array \$weight:</b><br>";
echo "Key: " . $secondKey . " Value: " . $weight[$secondKey] . " kg";