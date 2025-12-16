<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <h2>Masukkan Nilai Mahasiswa</h2>
    <form method="post" action="">
        <label for="nilai">Nilai (0-100): </label>
        <input type="number" name="nilai" id="nilai" required>
        <input type="submit" value="Cek Grade">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai = $_POST['nilai'];
        if ($nilai >= 85) {
            $grade = 'A';
        } elseif ($nilai >= 70) {
            $grade = 'B';
        } elseif ($nilai >= 55) {
            $grade = 'C';
        } elseif ($nilai >= 40) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }
        echo "<h3>Hasil:</h3>";
        echo "Nilai mahasiswa: $nilai<br>";
        echo "Grade mahasiswa: $grade<br>";
    }
    ?>
</body>
</html>



