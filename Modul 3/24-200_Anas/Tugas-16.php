<?php
$siswa = [
    'id_1' => 'Budi',
    'id_2' => 'Ani',
    'id_3' => 'Citra'
];

$key = array_search('Ani', $siswa);
echo $key;
?>