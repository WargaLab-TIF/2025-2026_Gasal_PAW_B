<?php
// Implementasi array_push()
echo "<b>Implementasi array_push()</b><br>";
$colors = array("Red", "Green");
array_push($colors, "Blue", "Yellow");

foreach ($colors as $color) {
    echo $color . "<br>";
}

// Implementasi fungsi array_merge()
echo "<br><b>Implementasi array_merge()</b><br>";
$fruits1 = array("Apel", "Pisang");
$fruits2 = array("Jeruk", "Buah Naga");

$all_fruits = array_merge($fruits1, $fruits2);
foreach ($all_fruits as $fruit) {
    echo $fruit . "<br>";
}

// Implementasi fungsi array_values()
echo "<br><b>Implementasi array_values()</b><br>";
$bio = [
    "Nama" => "Syadat",
    "Umur" => 20,
    "Tinggi" => 165.5
];
$values = array_values($bio);
foreach ($values as $value) {
    echo $value . "<br>";
}

// Implementasi fungsi array_search()
echo "<br><b>Implementasi array_search()</b><br>";
$vege = [
    "a" => "Bayam",
    "b" => "Tomat",
    "c" => "Wortel"
];
$key = array_search("Tomat", $vege);
echo "Key dari 'Tomat' adalah: " . $key;

// Implementasi fungsi array_filter()
echo "<br><br><b>Implementasi array_filter()</b><br>";
function ganjil($var) {
    return $var % 2 != 0;
}

$num = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$nums = array_filter($num, "ganjil");
foreach ($nums as $n) {
    echo $n . " ";
}

// Implementasi berbagai fungsi sorting pada array!
echo "<br><br><b>Implementasi berbagai fungsi sorting pada array!</b><br>";
$numbers = array(4, 2, 8, 6, 5, 1, 7, 3);
echo "<b>Array awal:</b><br> ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

// sort() - mengurutkan dari terkecil ke terbesar
sort($numbers);
echo "<b>Setelah sort():</b> ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

// rsort() - mengurutkan dari terbesar ke terkecil
rsort($numbers);
echo "<b>Setelah rsort():</b> ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

// asort() - mengurutkan array asosiatif berdasarkan nilai
$asort = array("a" => 3, "b" => 1, "c" => 2);

echo "<b>Array awal:</b><br> ";
foreach ($asort as $key => $value) {
    echo "$key => $value ";
}
echo "<br>";

asort($asort);
echo "<b>Setelah asort():</b> ";
foreach ($asort as $key => $value) {
    echo "$key => $value ";
}
echo "<br>";

// ksort() - mengurutkan array asosiatif berdasarkan kunci
$ksort = array("b" => 2, "c" => 3, "a" => 1);

echo "<b>Array awal:</b><br> ";
foreach ($ksort as $key => $value) {
    echo "$key => $value ";
}
echo "<br>";

ksort($ksort);
echo "<b>Setelah ksort():</b> ";
foreach ($ksort as $key => $value) {
    echo "$key => $value ";
}
?>