<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM supplier WHERE id = '$id'";

    if (mysqli_query($cont, $query)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location='Tugas-1.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($cont) . "');
                window.location='Tugas-1.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location='Tugas-1.php';
          </script>";
}
?>
