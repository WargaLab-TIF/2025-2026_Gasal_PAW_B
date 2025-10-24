<?php

$students = array("Alex", "Bianca", "Candice");

// Implementasi array_push()
array_push($students, "Darren", "Elena");
echo "<h2>1. Fungsi array_push()</h2>";
echo "Menambahkan data baru ke array:<br>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Implementasi array_merge()
$more_students = array("Felix", "Grace", "Hannah");
$merged = array_merge($students, $more_students);

echo "<h2>2. Fungsi array_merge()</h2>";
echo "Menggabungkan dua array menjadi satu:<br>";
echo "<pre>";
print_r($merged);
echo "</pre>";

// Implementasi array_values()
$assoc = array("one"=>"Alex", "two"=>"Bianca", "three"=>"Candice");
$values = array_values($assoc);

echo "<h2>3. Fungsi array_values()</h2>";
echo "Mengambil semua nilai dari array asosiatif (menghapus key):<br>";
echo "<pre>";
print_r($values);
echo "</pre>";


// Implementasi array_search()
$search_result = array_search("Candice", $merged);

echo "<h2>4. Fungsi array_search()</h2>";
if($search_result !== false) {
    echo "Data 'Candice' ditemukan pada indeks ke-$search_result<br>";
} else {
    echo "Data tidak ditemukan.<br>";
}

// Implementasi array_filter()
$numbers = array(10, 25, 32, 47, 50, 63, 71, 80);
$filtered = array_filter($numbers, function($num){
    return $num > 40; // hanya ambil angka > 40
});

echo "<h2>5. Fungsi array_filter()</h2>";
echo "Memfilter angka yang lebih besar dari 40:<br>";
echo "<pre>";
print_r($filtered);
echo "</pre>";


// Implementasi berbagai fungsi sorting
echo "<h2>6. Berbagai Fungsi Sorting</h2>";

$sort_array = array("Charlie", "Alex", "Bianca", "Darren");

echo "<b>Sebelum sort:</b><br>";
echo "<pre>"; print_r($sort_array); echo "</pre>";

// sort() — urutkan naik (A–Z)
sort($sort_array);
echo "<b>sort() → Urutan A-Z:</b><br>";
echo "<pre>"; print_r($sort_array); echo "</pre>";

// rsort() — urutkan turun (Z–A)
rsort($sort_array);
echo "<b>rsort() → Urutan Z-A:</b><br>";
echo "<pre>"; print_r($sort_array); echo "</pre>";

// asort() — urutkan naik berdasarkan value (menjaga key)
$assoc_sort = array("b"=>"Bianca", "a"=>"Alex", "c"=>"Candice");
asort($assoc_sort);
echo "<b>asort() → Sort by value (A-Z) tetap menjaga key:</b><br>";
echo "<pre>"; print_r($assoc_sort); echo "</pre>";

// ksort() — urutkan berdasarkan key (menaik)
ksort($assoc_sort);
echo "<b>ksort() → Sort berdasarkan key (A-Z):</b><br>";
echo "<pre>"; print_r($assoc_sort); echo "</pre>";

// arsort() — urutkan value menurun (menjaga key)
arsort($assoc_sort);
echo "<b>arsort() → Sort by value menurun (Z-A):</b><br>";
echo "<pre>"; print_r($assoc_sort); echo "</pre>";

// krsort() — urutkan key menurun
krsort($assoc_sort);
echo "<b>krsort() → Sort berdasarkan key menurun (Z-A):</b><br>";
echo "<pre>"; print_r($assoc_sort); echo "</pre>";

?>