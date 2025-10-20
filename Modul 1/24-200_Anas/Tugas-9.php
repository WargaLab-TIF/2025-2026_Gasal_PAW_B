<?php
    # Fungsi Dasar (Tanpa Argumen)
    function sapadunia() {
    echo "Halo dunia!";
    }

    sapadunia(); 
    echo "<br>";
    #Fungsi dengan 1 Argumen
    function sapanama($nama) {
    echo "Halo " . $nama . "!";
    }

    sapanama("Rambutan"); 
    echo "<br>";

    #Fungsi dengan Lebih dari 1 Argumen
    function jumlahkan($a, $b) {
    $hasil = $a + $b;
    echo "Hasil penjumlahannya adalah: " . $hasil;
    }

    jumlahkan(5, 10); 
    echo "<br>";

    #Fungsi dengan Default Value
    function pesandefault($pesan = "Selamat Datang") {
    echo $pesan;
    }

    pesandefault(); 
    echo "<br>";
    pesandefault("Terima Kasih"); 
    echo "<br>";

    #Fungsi yang Mengembalikan Nilai (Return)
    function kali($x, $y) {
    return $x * $y;
    }

    $hasilKali = kali(4, 6);
    echo "Hasil perkaliannya adalah: " . $hasilKali; 

?>