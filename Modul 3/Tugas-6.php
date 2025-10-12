<!-- soal 1 -->

<?php
$data = array("mawa","awaa","trwnt");

array_push($data, "tina","nara");
echo "<b>Implementasi array_push:</b> ";
foreach($data as $baru){
    echo "$baru,";
}

echo "<br>";
echo "<br>";

// soal 2
$buah1 =array("Durian","anggur");
$buah2 =array("pisang","melon");

$buahnew = array_merge($buah1, $buah2);

echo "<b>Implementasi array_merge: </b>";
foreach($buahnew as $item){
    echo $item . ",";
}

echo "<br>";
echo "<br>";

//soal 3
$arr = array("a"=>"apel","b"=>"bakso","c"=>"cicak");

$values = array_values($arr);

echo "<b>Implementasi array_values: </b>";
foreach($values as $abjad){
    echo $abjad . ",";
}

echo "<br>";
echo "<br>";

//soal 4
$dataa = array("a"=>"apel","b"=>"bakso","c"=>"cicak");

$key = array_search("bakso", $dataa);

echo "<b>Implementasi array_search: </b>";
echo "Nilai 'bakso' ditemukan pada key: " . $key;

echo "<br>";
echo "<br>";

//soal 5

$data = array("Alex", "", 3 , "Candice", 0, "David","");

$result = array_filter($data); 

echo "<b>Implementasi array_filter:</b> ";
foreach ($result as $item) {
    echo $item . ", ";
}

echo "<br>";
echo "<br>";

//soal 6
$numbers = array(5, 2, 9, 1, 7);

echo "<b>Implementasi Fungsi Sorting:</b> <br> ";

$asc = $numbers;
sort($asc);
echo "<b>sort:</b> ";
foreach ($asc as $n) echo $n . " ";
echo "<br>";

$desc = $numbers;
rsort($desc);
echo "<b>rsort:</b> ";
foreach ($desc as $n) echo $n . " ";
echo "<br>";

$assoc = array("a" => 30, "b" => 10, "c" => 20);
asort($assoc);
echo "<b>asort:</b> ";
foreach ($assoc as $k => $v) echo "$k = $v; ";
echo "<br>";

ksort($assoc);
echo "<b>ksort:</b> ";
foreach ($assoc as $k => $v) echo "$k = $v; ";

?>
