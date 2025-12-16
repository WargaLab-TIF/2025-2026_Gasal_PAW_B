<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<br>";
echo "<br>";
echo 'nomor1 menambah 5 data baru';
echo "<br>";
$height = array(
    "Joni" => "176",
    "Aldo" => "165",
    "Hemi" => "170",
    "Rafa" => "180",
    "Dava" => "172",
    "Paero" => "168",
    "Sodron" => "175",
    "Marjuki" => "169"
);

echo 'menggunakan foreach';
echo "<br>";
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
echo 'tidak karena foreach otomatis menelusuri semua isi array';
echo "<br>";
echo "<br>";

echo 'menggunakan for';
echo "<br>";
for ($x = 0; $x < count($height); $x++) {
    $keys = array_keys($height);
    echo "Key=" . $keys[$x] . ", Value=" . $height[$keys[$x]];
    echo "<br>";
}

echo "<br>";
echo "<br>";


echo 'nomor 2 membaut array baru';
echo "<br>";
$weight = array(
    "Andy" => "65",
    "Barry" => "59",
    "Charlie" => "62"
);

echo 'ppppppppppp';
echo $weight[1][1];
echo 'ppppppppppp';

echo 'menggunakan foreach';
echo "<br>";
foreach ($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . " kg";
    echo "<br>";
}
echo "<br>";
echo 'menggunakan for';
echo "<br>";
for ($x = 0; $x < count($weight); $x++) {
    $keys = array_keys($weight);
    echo "Key=" . $keys[$x] . ", Value=" . $weight[$keys[$x]] . " kg";
    echo "<br>";
}
echo 'modif dikit karena bisa digunakan ulang ke weight cukup ganti nama variabel array';