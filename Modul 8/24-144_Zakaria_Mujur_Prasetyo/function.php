<?php
session_start();

include 'config.php';

function checkLogin($data){
    global $conn;

    $username = $data['username'];
    $password = md5($data['password']);

    $query = "SELECT * FROM users WHERE username = '$username'  AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0 ) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user['nama'];
        
        // Map level to role name for display/logic
        // Level 1 = Admin, Level 2 = User (as per requirements)
        if ($user['level'] == '1') {
            $_SESSION['role'] = 'Admin';
        } elseif ($user['level'] == '2') {
            $_SESSION['role'] = 'User';
        } else {
            $_SESSION['role'] = 'Unknown';
        }
        
        // Store the raw level as well if needed
        $_SESSION['level'] = $user['level'];

        header('Location: index.php');
        exit;
    } else {
        return "Username atau Password salah!";
    }
}
?>