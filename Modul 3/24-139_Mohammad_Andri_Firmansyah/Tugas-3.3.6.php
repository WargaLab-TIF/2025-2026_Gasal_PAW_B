<?php
// 1. Implementasi fungsi array_push()!
$gem = array("pearl", "amethyst", "garnet");
array_push($gem, "ruby", "sapphire");

foreach($gem as $d){
    echo $d . "<br>";
}
// 2. Implementasi fungsi array_merge()! 
echo "<hr>";
$gem2 = array("lapis lazuli", "peridot", "bismuth");
$fusion = array_merge($gem, $gem2);

foreach($fusion as $v){
    echo $v . "<br>";
}

// 3. Implementasi fungsi array_values()!
echo "<hr>";
$anime = array(
    "name"=>"Naruto Shippuden",
    "all opening"=>20,
    "all episode"=>500
);

$value = array_values($anime);

foreach($value as $v){
    echo $v . ", ";
}
// 4. Implementasi fungsi array_search()!
echo "<hr>";

echo array_search("Naruto Shippuden", $anime) . " ditemukan" . "<br>";
echo array_search("Jujutsu Kaisen", $anime) . "tidak ditemukan" . "<br>";

// 5. Implementasi fungsi array_filter()!
echo "<hr>";
$no = array(1, 23, 45, 67, 2, 3, 5, 6, 99);

function nokecil($no){
    return $no < 10;
}

$filter = array_filter($no, "nokecil");
foreach($filter as $v){
    echo $v . ", ";
}

// 6. Implementasi berbagai fungsi sorting pada array!

echo "<hr>";
$data = array(
    "Tony" => 2804111,
    "Steve" => 2904111,
    "Natasha" => 3004111,
    "Banner" => 2304111
);
arsort($data); // menurun(Descending) berdasarkan value
echo "Sorting menurun(Descending) berdasarkan Value <br><br>";
foreach($data as $k => $v){
    echo "Nama: " . $k . " - NIM: " . $v . "<br>";
}
echo "<br>";
krsort($data); // menurun(Descending) berdasarkan key
echo "Sorting menurun(Descending) berdasarkan Key <br><br>";
foreach($data as $k => $v){
    echo "Nama: " . $k . " - NIM: " . $v . "<br>";
}
echo "<br>";
asort($data); // menaik(Ascending) berdasarkan value
echo "Sorting menaik(Ascending) berdasarkan Value <br><br>";
foreach($data as $k => $v){
    echo "Nama: " . $k . " - NIM: " . $v . "<br>";
}
echo "<br>";
ksort($data); // menaik(Ascending) berdasarkan key
echo "Sorting menaik(Ascending) berdasarkan Key <br><br>";
foreach($data as $k => $v){
    echo "Nama: " . $k . " - NIM: " . $v . "<br>";
}

?>