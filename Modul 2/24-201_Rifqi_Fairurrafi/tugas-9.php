<html>
    <title>Grade Mahasiswa</title>
    <body>
        <form action="" method="get">
            Masukkan Nilai : <input type="number" name="nilai">
            <button type="submit">Submit</button>
        </form>
    </body>
</html>

<?php
$nilai = $_GET["nilai"] ?? 0;

if ($nilai >= 80){
    echo "A";
} elseif ($nilai >= 70){
    echo "B";
} elseif ($nilai >= 60){
    echo "C";
} elseif ($nilai >= 50){
    echo "D";
} else {
    echo "E";
}
?>