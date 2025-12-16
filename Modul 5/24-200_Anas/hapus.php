<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pabrik"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM supplier WHERE id = ?");
    $stmt->bind_param("i", $id); 

    if ($stmt->execute()) {
        $conn->close();
        header("Location: index.php?status=sukses_hapus");
        exit();
    } else {
        $conn->close();
        header("Location: index.php?status=gagal_hapus&error=" . urlencode($stmt->error));
        exit();
    }
    
    $stmt->close();

} else {
    $conn->close();
    header("Location: index.php?status=id_tidak_valid");
    exit();
}
?>