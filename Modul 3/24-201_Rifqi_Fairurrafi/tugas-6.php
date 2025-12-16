<?php
echo "<b>1. Implementasi fungsi array_push() :</b><br>";
$pokemon = ["Pikachu", "Charmander", "Squirtle"];
echo "Array Pokémon awal:<br>";
foreach ($pokemon as $p) {
    echo "- $p<br>";
}
echo "<br>";

array_push($pokemon, "Bulbasaur", "Eevee");
echo "Setelah menambahkan Bulbasaur dan Eevee ke array Pokémon:<br>";
foreach ($pokemon as $p) {
    echo "- $p<br>";
}
echo "<br>";

echo "<b>2. Implementasi fungsi array_merge() :</b><br>";
$starterKanto = ["Pikachu", "Charmander"];
$starterJohto = ["Chikorita", "Cyndaquil", "Totodile"];
$allStarter = array_merge($starterKanto, $starterJohto);
echo "Menggabungkan array starter Kanto dan Johto:<br>";
foreach ($allStarter as $s) {
    echo "- $s<br>";
}
echo "<br>";

echo "<b>3. Implementasi fungsi array_values() :</b><br>";
$pokemonType = [
    "electric" => "Pikachu",
    "fire" => "Charmander",
    "water" => "Squirtle"
];
$values = array_values($pokemonType);
echo "Mengambil hanya nilai Pokémon tanpa key tipe:<br>";
foreach ($values as $v) {
    echo "- $v<br>";
}
echo "<br>";

echo "<b>4. Implementasi fungsi array_search() :</b><br>";
$pokemon = ["Pikachu", "Charmander", "Bulbasaur", "Squirtle"];
$key = array_search("Bulbasaur", $pokemon);
echo "Bulbasaur ditemukan pada index ke-$key<br><br>";

echo "<b>5. Implementasi fungsi array_filter() :</b><br>";
$pokemonPower = [
    "Pikachu" => 55,
    "Bulbasaur" => 49,
    "Charmander" => 52,
    "Magikarp" => 10
];
$strongPokemon = array_filter($pokemonPower, function($power) {
    return $power > 50;
});
echo "Pokémon dengan power di atas 50:<br>";
foreach ($strongPokemon as $name => $power) {
    echo "- $name : $power<br>";
}
echo "<br>";

echo "<b>6. Implementasi berbagai fungsi sorting pada array :</b><br><br>";

$pokemon = ["Snorlax", "Eevee", "Charizard", "Bulbasaur"];
sort($pokemon);
echo "a) sort() → Mengurutkan nama Pokémon secara alfabet naik:<br>";
foreach ($pokemon as $p) {
    echo "- $p<br>";
}
echo "<br>";

rsort($pokemon);
echo "b) rsort() → Mengurutkan nama Pokémon secara alfabet menurun:<br>";
foreach ($pokemon as $p) {
    echo "- $p<br>";
}
echo "<br>";

$pokemonPower = ["Pikachu" => 55, "Charmander" => 52, "Bulbasaur" => 49];
asort($pokemonPower);
echo "c) asort() → Mengurutkan berdasarkan nilai (power) naik, mempertahankan key:<br>";
foreach ($pokemonPower as $name => $power) {
    echo "- $name : $power<br>";
}
echo "<br>";

ksort($pokemonPower);
echo "d) ksort() → Mengurutkan berdasarkan key (nama Pokémon) secara alfabet naik:<br>";
foreach ($pokemonPower as $name => $power) {
    echo "- $name : $power<br>";
}
echo "<br>";

arsort($pokemonPower);
echo "e) arsort() → Mengurutkan berdasarkan nilai (power) menurun:<br>";
foreach ($pokemonPower as $name => $power) {
    echo "- $name : $power<br>";
}
echo "<br>";

krsort($pokemonPower);
echo "f) krsort() → Mengurutkan berdasarkan key (nama Pokémon) menurun:<br>";
foreach ($pokemonPower as $name => $power) {
    echo "- $name : $power<br>";
}
?>
