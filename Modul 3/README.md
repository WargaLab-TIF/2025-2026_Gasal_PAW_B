# Modul 3

# 3.3 Tugas Praktikum
Pada latihan ini mencakup pendeklarasian dan pengaksesan array terindeks, array asosiatif, dan array multidimensi.

## 3.3.1. Mendeklarasikan dan mengakses array terindeks

Skrip berikut adalah contoh untuk mendeklarasikan dan mengakses array terindeks:

```php
<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
?>
```

Implementasikan skrip dan kemudian lakukan eksplorasi serta sekaligus jawab pertanyaan-pertanyaan berikut ini:
1. Menambahkan lima data baru dalam array $fruits! Tampilkan nilai dengan indeks tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits?
2. Hapus satu data tertentu dari array $fruits! Tampilkan nilai dengan indeks tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits?
3. Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan seluruh data dari array $vegies!

---

## 3.3.2. Mengetahui panjang array dan mengakses array terindeks menggunakan struktur perulangan (loop)

Skrip berikut adalah contoh untuk mengetahui panjang dan mengakses array terindeks dengan menggunakan struktur perulangan FOR:

```php
<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
?>
```

Implementasikan skrip dan kemudian lakukan eksplorasi serta sekaligus jawab pertanyaan-pertanyaan berikut ini:
1. Menambahkan lima data baru dalam array $fruits dengan menggunakan struktur perulangan FOR! Berapa panjang (atau berapa jumlah data) array $fruits saat ini? Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #5 – #8) untuk menampilkan seluruh data dalam array $fruits dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan!
2. Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan seluruh data dari array $vegies dengan menggunakan struktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $vegies ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian? Jelaskan!

---

## 3.3.3. Mendeklarasikan dan mengakses array asosiatif

Skrip berikut adalah contoh untuk mendeklarasikan dan mengakses array asosiatif:

```php
<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";
?>
```

Implementasikan skrip dan kemudian lakukan eksplorasi serta sekaligus jawab pertanyaan-pertanyaan berikut ini:
1. Menambahkan lima data baru dalam array $height! Tampilkan nilai dengan indeks terakhir dari array $height!
2. Hapus satu data tertentu dari array $height! Tampilkan nilai dengan indeks terakhir dari array $height!
3. Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan data kedua dari array $weight!

---

## 3.3.4. Mengakses array asosiatif dengan perulangan menggunakan struktur perulangan (loop)

Skrip berikut adalah contoh untuk mengakses array asosiatif dengan menggunakan struktur perulangan FOR:

```php
<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>
```

Implementasikan skrip dan kemudian lakukan eksplorasi serta sekaligus jawab pertanyaan-pertanyaan berikut ini:
1. Menambahkan lima data baru dalam array $height! Apakah Anda perlu melakukan perubahan pada skrip penggunaan struktur perulangan FOR (skrip pada baris #4 – #7) untuk menampilkan seluruh data dalam array $height dengan adanya penambahan lima data baru? Mengapa demikian? Jelaskan!
2. Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan seluruh data dari array $weight dengan menggunakan struktur perulangan FOR! Apakah Anda membuat skrip baru untuk menampilkan seluruh array $weight ataukah Anda cukup sedikit memodifikasi skrip yang sudah ada? Mengapa demikian? Jelaskan!

---

## 3.3.5. Mendeklarasikan dan mengakses array Multidimensi

Visualisasi data multidimensi dapat direpresentasikan dalam bentuk tabel. Sebagai contoh adalah tabel data “students” berikut:

| Name   | NIM    | Mobile      |
|--------|--------|-------------|
| Alex   | 220401 | 0812345678  |
| Bianca | 220402 | 0812345687  |
| Candice| 220403 | 0812345665  |

Skrip berikut adalah contoh untuk mendeklarasikan dan mengakses array multidimensi:
```php
<?php
$students = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665")
);

for ($row = 0; $row < 3; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
        echo "<li>".$students[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
```

Implementasikan skrip dan kemudian lakukan eksplorasi serta sekaligus jawab pertanyaan-pertanyaan berikut ini:
1. Menambahkan lima data baru dalam array $students!
2. Tampilkan data dalam array $students dalam bentuk tabel!

---

## 3.3.6. Eksplorasi lebih lanjut terhadap array

Lakukan eksplorasi lebih lanjut terhadap array untuk melakukan beberapa hal berikut:
1. Implementasi fungsi `array_push()`
2. Implementasi fungsi `array_merge()`
3. Implementasi fungsi `array_values()`
4. Implementasi fungsi `array_search()`
5. Implementasi fungsi `array_filter()`
6. Implementasi berbagai fungsi sorting pada array

---

## 3.4 Referensi

- [W3Schools – PHP Arrays](https://www.w3schools.com/php/php_arrays.asp)
- [PHP.net – Arrays](https://www.php.net/manual/en/language.types.array.php)
```
