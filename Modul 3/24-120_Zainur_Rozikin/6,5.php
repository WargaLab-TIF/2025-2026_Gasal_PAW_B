<?php
$mahasiswa = [
    ["nama" => "Alex", "nilai" => 85],
    ["nama" => "Budi", "nilai" => 75],
    ["nama" => "Citra", "nilai" => 90],
    ["nama" => "Diana", "nilai" => 60],
    ["nama" => "Erik", "nilai" => 95]
];

$mahasiswa_berprestasi = array_filter($mahasiswa, function($m) {
    return $m["nilai"] > 80;
});

echo "Mahasiswa dengan nilai di atas 80:\n";
foreach ($mahasiswa_berprestasi as $m) {
    echo "- {$m['nama']} (Nilai: {$m['nilai']})\n";
}