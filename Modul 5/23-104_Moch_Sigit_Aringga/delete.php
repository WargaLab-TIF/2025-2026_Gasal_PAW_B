<?php
require_once "konek.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM supplier WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location = 'read.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location = 'read.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location = 'read.php';
          </script>";
}
