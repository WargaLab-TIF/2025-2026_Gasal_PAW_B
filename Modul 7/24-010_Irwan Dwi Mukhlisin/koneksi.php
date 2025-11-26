<?php

$conn = mysqli_connect('localhost', 'root', '', 'reporting');
if (!$conn) {
    echo "koneksi error";
}