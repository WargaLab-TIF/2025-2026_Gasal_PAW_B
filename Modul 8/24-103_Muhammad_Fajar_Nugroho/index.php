<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] === '') {
    header('Location: pages/login/');
    exit();
}

header('Location: pages/home/');
exit();
?>