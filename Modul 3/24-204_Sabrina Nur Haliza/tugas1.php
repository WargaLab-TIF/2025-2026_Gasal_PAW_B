<?php
//1. Deklarasi awal array $fruits
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "<h3>Langkah 1: Deklarasi Awal</h3>";
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br><br>";

//2. setelah menambah 5data baru
$fruits[] = "Durian";
$fruits[] = "Elderberry";
$fruits[] = "Fig";
$fruits[] = "Grape";
$fruits[] = "Honeydew";

echo "<h3>langkah 2: setelah menambah 5data baru</h3>";
echo "daftar buah sekarang:<br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo $i . " : " . $fruits[$i] . "<br>";
}

$lastIndex = array_key_last($fruits);
echo "nilai dengan indeks tertinggi: " . $fruits[$lastIndex] . "<br>";
echo "indeks tertinggi dari array fruits: " . $lastIndex . "<br><br>";

//3. setelah menghapus 'cherry'
$fruits_baru = array();
for ($i = 0; $i < count($fruits); $i++) {
    if ($fruits[$i] != "Cherry") {
        $fruits_baru[] = $fruits[$i];
    }
}

echo "<h3>langkah 3: setelah menghapus 'cherry' </h3>";
for ($i = 0; $i < count($fruits_baru); $i++) {
    echo $i . " : " . $fruits_baru[$i] . "<br>";
}

$lastIndex = count($fruits_baru) - 1;
echo "Nilai dengan indeks tertinggi sekarang: " . $fruits_baru[$lastIndex] . "<br>";
echo "Indeks tertinggi sekarang: " . $lastIndex . "<br><br>";

//4. array baru $vegies
$vegies = array("brocoli", "carrot", "spinach");

echo "<h3>langkah 4: array baru \$vegies</h3>";
for ($i = 0; $i < count($vegies); $i++) {
    echo $i . " : " . $vegies[$i] . "<br>";
}
?>