<?php

require_once "koneksi.php";




$data1 = "INSERT INTO supplier (nama, telp, alamat) VALUES 
         ('PT. Maju Bersama', '08123456', 'Surabaya')";

if (mysqli_query($conn, $data1)) {
    echo "Data 1 berhasil ditambahkan <br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

$data2 = "INSERT INTO supplier (nama, telp, alamat) VALUES 
         ('PT. Senang Sekali', '081515563', 'Bangkalan')";

if (mysqli_query($conn, $data2)) {
    echo "Data 2 berhasil ditambahkan <br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}

$data3 = "INSERT INTO supplier (nama, telp, alamat) VALUES 
         ('PT. Segar Segar', '0845454663', 'Surabaya')";

if (mysqli_query($conn, $data3)) {
    echo "Data 3 berhasil ditambahkan <br>";
} else {
    echo "Error: " . mysqli_error($conn) . "<br>";
}





echo "<a href='Tugas-1.php'>Tugas-1.php</a>";

mysqli_close($conn);
?>