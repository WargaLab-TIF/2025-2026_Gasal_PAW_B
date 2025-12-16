<?php 
$t = date("H"); // untuk ambil jam sekarang (format 24 jam)

if ($t < "10") { // jika sebelum jam 10 pagi
    echo "have a good morning!"; // tampilkan pesan pagi
} elseif ($t < "20") { // jika antara jam 10 pagi sampai sebelum jam 8 malam
    echo "have a good day!"; // tampilkan pesan siang
} else { // jika jam 8 malam ke atas
    echo "have a good night!"; // tampilkan pesan malam
}
?>
