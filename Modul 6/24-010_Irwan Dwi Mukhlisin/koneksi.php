<?php
$conn = mysqli_connect("localhost", "root", "", "tp6");
if (!$conn) {
    die("gagal terhubung" . mysqli_connect_error());
}