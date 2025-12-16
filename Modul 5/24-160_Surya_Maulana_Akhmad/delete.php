<?php
require "koneksi.php";

if (isset($_GET['id']) ? $_GET['id'] : '') {

    // ambil Data supplier di halaman 
    $id = $_GET['id'];

    mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");

    echo "<script>
              document.location.href = 'index.php';
        </script>";

    return mysqli_affected_rows($conn);
}

?>