<?php
// 1. Membuat array asosiatif awal
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

//menambahkan 5 data baru ke array $height
$height["david"] = "172";
$height["edward"] = "180";
$height["fiona"] = "168";
$height["george"] = "175";
$height["helen"] = "166";

// 3. Menampilkan seluruh data array $height menggunakan struktur perulangan FOR
echo "<b>data tinggi (height):</b><br>";
$keys = array_keys($height);		// ambil semua key (nama)
$values = array_values($height); 	// ambil semua value (tinggi)
$length = count($height);			// hitung jumlah elemen

for ($i = 0; $i < $length; $i++) {
    echo "Key = " . $keys[$i] . ", Value = " . $values[$i] . " cm<br>";
}

echo "<hr>";

// 4. Membuat array baru $weight
$weight = array(
    "Andy" => "60",
    "Barry" => "55",
    "Charlie" => "58"
);	

// 5. Menampilkan seluruh data array $weight menggunakan struktur perulangan FOR
echo "<b>Data berat (weight):</b><br>";
$keys2 = array_keys($weight); 
$values2 = array_values($weight); 
$length2 = count($weight); 

for ($i = 0; $i < $length2; $i++) {
    echo "Key = " . $keys2[$i] . ", Value = " . $values2[$i] . " kg<br>";
}
?>