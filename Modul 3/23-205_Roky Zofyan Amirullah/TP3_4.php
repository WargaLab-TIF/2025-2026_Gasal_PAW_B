<?php
$height = array(
    "Andy"    => "176",
    "Barry"   => "165",
    "Charlie" => "170"
);
$height["David"]  = "180";
$height["Eric"]   = "175";
$height["Frank"]  = "168";
$height["George"] = "172";
$height["Henry"]  = "178";
foreach ($height as $nama => $nilai_tinggi) {
    echo "Nama = " . $nama . ", Tinggi = " . $nilai_tinggi . " cm<br>";
}
echo "<br><br>"; 

echo "Menampilkan Array: <br>";
$weight = array(
    "Andy"    => "70",
    "Barry"   => "65",
    "Charlie" => "68"
);
$keys = array_keys($weight);
$jumlah_data = count($weight);
for ($i = 0; $i < $jumlah_data; $i++) {
    $nama = $keys[$i];
    $nilai_berat = $weight[$nama];
    echo "Nama = " . $nama . ", Berat = " . $nilai_berat . " kg<br>";
}
?>