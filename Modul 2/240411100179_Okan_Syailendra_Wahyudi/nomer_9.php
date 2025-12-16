<html>
<head>
</head>
<body>
    <h2>Input Nilai</h2>
    <form method="post">
        Nilai: <input type="number" name="nilai" min="0" max="100" required>
        <input type="submit" value="Cek Grade">
    </form>

    <?php
        $nilai = $_POST['nilai'];
        $grade = '';

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

        echo "<p>Nilai Anda:$nilai</p>";
        echo "<p>Grade:$grade</p>";
    ?>
</body>
</html>