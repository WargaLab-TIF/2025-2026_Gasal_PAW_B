# MODUL 2 : Perulangan & Percabangan

## 2.3 Tugas Praktikum

Bagian ini mencakup kondisi dan perulangan, dimana mereka memiliki beberapa style penulisan kode. Simpanlah semua file-file dalam folder tersendiri, cobalah dan pahami serta eksplorasi latihan-latihan yang diberikan pada modul ini. Setiap style perulangan dan kondisi diterapkan pada kasus yang berbeda.

a Percabangan

1) If Statement

<?php
$t = date("H");
if ($t < "20") {
  echo "Have a good day!";
}
?>

2) if...else statement

<?php
$t = date("H");
if ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?>

3) if...elseif...else statement

<?php
$t = date("H");
if ($t < "10") {
  echo "Have a good morning!";
} elseif ($t < "20") {
  echo "Have a good day!";
} else {
  echo "Have a good night!";
}
?>

4) Switch statement

<?php
$favcolor = "red";
switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>

b Perulangan

5) While

<?php
$x = 1;
while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}
?>

6) do...while

<?php
$x = 1;
do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);
?>

7) for

<?php
for ($x = 0; $x <= 10; $x++) {
  echo "The number is: $x <br>";
}
?>

8) foreach

<?php
$colors = array("red", "green", "blue", "yellow");
foreach ($colors as $value) {
  echo "$value <br>";
}
?>

9) Modifikasi contoh percabangan untuk menampilkan grade nilai mahasiswa ! (clue : tentu saja ada input dan output)
10) Kembangkan program sistem kasir sederhana dengan menu, perulangan, dan total harga ! (clue: ada input pilihan menu yang dibeli, dan ulang lagi jika ada item menu lagi yang lain).

## 2.4 Referensi

Hakim, Lukmanul. 2014. Rahasia Inti Master PHP & MySQLi (improved). Yogyakarta, Lokomedia
Arifin, Oki. 2015. Modul Pemrograman Web Lanjut. STMIK AMIKOM Yogyakarta.
Hartama, Dedy., Efrizal. 2012. Pemrograman Web dengan HTML, CSS, dan Javascript. Yogyakarta : Penerbit ANDI. (Javascript.137-138, CSS.97-98, HTML.
Raharjo, Budi., dkk. 2014. Modul Pemrograman Web HTML, PHP, & MySQL. Bandung: Modula.
