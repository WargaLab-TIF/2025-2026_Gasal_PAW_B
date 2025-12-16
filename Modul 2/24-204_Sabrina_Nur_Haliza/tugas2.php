<?php 
$t = date("H"); // untuk ambil jam sekarang (format 24 jam)

if ($t < "20") { // untuk cek apakah jam kurang dari 20 (sebelum jam 8 malam)
    echo "have a good day!"; // tampilkan pesan siang
} else {
    echo "have a good night!"; // tampilkan pesan malam
}
?>
