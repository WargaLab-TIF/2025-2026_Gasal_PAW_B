# Modul 4

## 4.3 Tugas Praktikum 

Pada latihan ini mencakup pembuatan validasi server-side pada form yang telah dibuat sebelumnya pada Sub-bab 0.

### 1. Validasi Server-side Secara Sederhana
Lakukan langkah-langkah berikut untuk menambahkan validasi server-side pada form yang telah dibuat dalam Sub-bab 0:

1. Buatlah file PHP “validate.inc” yang berisi sebuah fungsi validateName yang digunakan untuk memvalidasi field masukan surname dengan format alfabet:
```php
<?php
function validateName($field_list, $field_name) {
    if (!isset($field_list[$field_name])) return false;
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $field_list[$field_name])) return false;
    return true;
}
```

2. Ubah file “processData.php” agar menambahkan file “validate.inc” dan melakukan validasi surname:
```php
<?php
require 'validate.inc';
if (validateName($_POST, 'surname')) echo 'Data OK!';
else echo 'Data invalid!';
```

3. Lakukan pengujian form dengan mengisi field masukan surname dengan data yang benar (format alfabet) dan data yang salah! Amati dan jelaskan apa yang terjadi!

4. Ubah fungsi validateName agar dapat menyimpan detil pesan error dalam bentuk
array:
```php
<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty($field_list[$field_name])) {
        $errors[$field_name] = 'required';
    } else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid';
    }
}
```

5. Ubah file “processData.php” agar dapat menampilkan detil pesan error:
```php
<?php
require 'validate.inc';
$errors = array();
validateName($errors, $_POST, 'surname');
if ($errors) {
    echo 'Errors:<br/>';
    foreach ($errors as $field => $error) {
        echo "$field: $error<br/>";
    }
} else {
    echo 'Data OK!';
}
```

6. Lakukan kembali pengujian form dengan mengisi field masukan surname dengan data yang benar (format alfabet) dan data yang salah! Amati dan jelaskan apa yang terjadi!

7. Apa perbedaan hasil pengujian kali ini dengan pengujian pada Langkah #3?

---

### 2. Validasi Server-side dengan Self-Submission
Self-submission adalah mengirimkan isian form ke file yang berisi skrip form itu sendiri (nilai atribut action adalah nama file itu sendiri). Lakukan langkah-langkah berikut untuk mengubah proses validasi server-side yang telah dibuat dalam Sub-bab 0 menjadi self-submission:

1. Ubahlah file HTML yang berisi skrip form menjadi file dengan ekstensi PHP!
2. Ubahlah nilai atribut action dengan nama file PHP yang dibuat pada Langkah #1!
3. Lakukan kembali pengujian form untuk memastikan bahwa tidak ada error pada form dengan format file yang baru!
4. Untuk memisahkan skrip form dari pemrosesan data, pindahkan skrip form (seluruh skrip yang berada di dalam elemen <FORM>) ke dalam file “form.inc”!

5. Ubah struktur file PHP agar dapat melaksanakan skenario pemrosesan error berikut:
```php
<?php
$errors = array();
if (isset($_POST['surname'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) echo "$field: $error<br/>";
        include 'form.inc';
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    include 'form.inc';
}
?>
```

6. Lakukan pengujian form dengan mengisi field masukan surname dengan data yang benar (format alfabet) dan data yang salah! Amati dan jelaskan apa yang terjadi! Apa perbedaan hasil pengujian ini dengan pengujian pada Sub-bab 0(Langkah #6)?

7. Ubah skrip dalam file “form.inc” agar ketika validasi form menghasilkan pesan error maka ia juga dapat menampilkan data yang telah terisi sebelumnya. Skenario pemrosesan error menjadi seperti berikut:

8. Lakukan kembali pengujian form dengan mengisi field masukan surname dengan data yang benar (format alfabet) dan data yang salah! Amati dan jelaskan apa yang terjadi! Apa perbedaan hasil pengujian kali ini dengan pengujian pada Langkah #6?

9. Coba tambahkan validasi server-side untuk field masukan yang lain dan tampilkan pesan error yang bersesuaian dengan setiap field masukan!

---

### 3. Eksplorasi lebih lanjut terhadap Validasi Server-side
Lakukan eksplorasi lebih lanjut terhadap validasi serverside dengan mengimplementasikan daftar jenis fungsi (dan contoh fungsi built-in) berikut:

1. Regular expressions. Contoh: preg_match
2. Manipulasi string. Contoh: trim, strtolower, strtoupper
3. Filter. Contoh: filter_var, filter_input,FILTER_VALIDATE_EMAIL, FILTER_VALIDATE_URL, FILTER_VALIDATE_FLOAT, FILTER_VALIDATE_IP
4. Type testing. Contoh: is_float, is_int, is_numeric, is_string
5. Date. Contoh: checkdate

---

### Tugas Lanjutan
7. Buat form input data mahasiswa dengan validasi sisi server ! 
8. Tambahkan validasi lanjutan (regex untuk email, panjang password) dan tampilkan error messages (jika inputan tidak valid) !
