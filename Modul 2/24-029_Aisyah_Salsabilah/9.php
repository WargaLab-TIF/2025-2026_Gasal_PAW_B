<?php
$nilaiMahasiswa = [90, 80, 75, 65, 50]; // seolah-olah input dari user

$total = 0;
$jumlah = count($nilaiMahasiswa);

foreach ($nilaiMahasiswa as $n) {
    $total += $n;
}

if ($jumlah > 0) {
    $rata = $total / $jumlah;

    if ($rata >= 85 && $rata <= 100) {
        $grade = 'A';
    } elseif ($rata >= 70 && $rata < 85) {
        $grade = 'B';
    } elseif ($rata >= 56 && $rata < 70) {
        $grade = 'C';
    } elseif ($rata >= 40 && $rata < 56) {
        $grade = 'D';
    } else {
        $grade = 'E';
    }

    // penataan
    echo "<pre>";
    echo "==============================\n";
    echo "     HASIL NILAI MAHASISWA    \n";
    echo "==============================\n";
    
    $i = 1;
    foreach ($nilaiMahasiswa as $n) {
        echo "Nilai ke-" . str_pad($i, 2, " ", STR_PAD_LEFT) . " : " . str_pad($n, 3, " ", STR_PAD_LEFT) . "\n";
        $i++;
    }

    echo "------------------------------\n";
    echo "Jumlah Nilai : " . str_pad($jumlah, 3, " ", STR_PAD_LEFT) . "\n";
    echo "Total Nilai  : " . str_pad($total, 3, " ", STR_PAD_LEFT) . "\n";
    echo "Rata-rata    : " . str_pad(number_format($rata,2), 6, " ", STR_PAD_LEFT) . "\n";
    echo "------------------------------\n";
    echo "GRADE        : " . $grade . "\n";
    echo "==============================\n";
    echo "</pre>";
} else {
    echo "Tidak ada nilai yang dimasukkan.";
}
