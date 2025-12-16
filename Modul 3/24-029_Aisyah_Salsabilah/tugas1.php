<?php  
$fruits = array("Avocado", "Blueberry", "Cherry", "Durian", "Mango", "Papaya", "Orange", "Apple");

echo "<h3>Data Array \$fruits (Sebelum Dihapus)</h3>";
echo "Nilai dengan indeks tertinggi: " . end($fruits) . "<br>";
echo "Indeks tertinggi: " . max(array_keys($fruits)) . "<br><br>";

unset($fruits[2]);

echo "<h3>Data Array \$fruits (Setelah Menghapus 'Cherry')</h3>";
echo "Nilai dengan indeks tertinggi sekarang: " . end($fruits) . "<br>";
echo "Indeks tertinggi: " . max(array_keys($fruits)) . "<br><br>";

$vegies = array("Carrot", "Broccoli", "Spinach");

echo "<h3>Data Array \$vegies</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>No</th><th>Nama Sayur</th></tr>";
$no = 1;
foreach($vegies as $v){
    echo "<tr><td>$no</td><td>$v</td></tr>";
    $no++;
}
echo "</table>";
?>
