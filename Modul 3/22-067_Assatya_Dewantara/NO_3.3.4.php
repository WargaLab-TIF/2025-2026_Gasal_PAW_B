<?php
// Membuat array asosiatif berisi nama dan tinggi badan
$height = array(
	"Andy" => "176", 
	"Barry" => "165", 
	"Charlie" => "170"
);

// Menambahkan 5 data baru
$height["Denny"] = "180";
$height["Eko"] = "175";
$height["Fajar"] = "169";
$height["Gina"] = "160";
$height["Hani"] = "158";

// Menampilkan seluruh data dengan foreach
foreach($height as $nama => $tinggi) {
	echo "Key = " . $nama . ", Value = " . $tinggi . " cm<br>";
}
// Membuat array numerik berisi berat badan
$weight = array(60, 72, 68);

// Menampilkan seluruh data menggunakan perulangan for
for($i = 0; $i < count($weight); $i++) {
	echo "Data ke-" . ($i+1) . " = " . $weight[$i] . " kg<br>";
}
?>