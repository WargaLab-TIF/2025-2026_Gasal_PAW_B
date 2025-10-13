<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
echo "Key=" . $x . ", Value=" . $x_value;
echo "<br>";
}
echo "<br>";
// soal 1
echo "1. Menambahkan lima data baru dalam array $ height! Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #4 – #7) untuk menampilkan seluruh data dalam array $ height dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan!";
echo "<br><br>";

// tambah data baru
$newHeight = [
    'Zekk' => 168,
    'Budi' => 172,
    'Fajar' => 169,
    'Syadat'  => 160,
    'Hana'  => 158
];

echo "<br>jawab: <br>";
$height = array_merge($height, $newHeight);
$keys = array_keys($height);
for ($i = 0, $n = count($keys); $i < $n; $i++) {
    $k = $keys[$i];
    echo "Key=" . $k . ", Value=" . $height[$k] . "<br>";
}
echo '<br> Tidak perlu mengubah FOR jika batas perulangan berbasis count($height)/array_keys($height), karena jumlah elemen dibaca dinamis. Perubahan hanya perlu bila batas atas di-hardcode. Karena $height asosiatif, FOR harus memakai array_keys (bukan indeks numerik).';
echo "<br><br>";
// soal 2
echo "2. Buat array baru dengan nama $ weight yang memiliki tiga buah data! Tampilkan seluruh data dari array $ weight dengan menggunakan stuktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $ weight ataukah Anda cukup sedikit memofikasi skrip yang sudah ada? Mengapa demikian? Jelaskan!";  
echo "<br><br>";

echo "<br>jawab: <br>";
$weight = array(60, 65, 70);
for ($i = 0; $i < count($weight); $i++) {
    echo "Index " . $i . ", Value=" . $weight[$i] . "<br>";
}
echo '<br> Cukup memodifikasi pola FOR yang sama; ganti sumber array dan variabel. Untuk array berindeks numerik seperti $weight, FOR dengan count($weight) langsung bekerja tanpa perubahan logika.';
echo "<br>";
?>