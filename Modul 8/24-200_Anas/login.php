<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css"> <style>
        body { background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 350px; }
        .login-box h2 { text-align: center; color: #3498db; margin-bottom: 20px; border-bottom: none; }
        .alert { color: red; text-align: center; font-size: 14px; margin-bottom: 15px; }
        input[type="text"], input[type="password"] { width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; background: #3498db; color: white; border: none; padding: 10px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background: #2980b9; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>

    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "<div class='alert'>Username atau Password salah!</div>";
        }else if($_GET['pesan'] == "logout"){
            echo "<div class='alert' style='color:green;'>Anda berhasil logout.</div>";
        }else if($_GET['pesan'] == "belum_login"){
            echo "<div class='alert'>Silahkan login terlebih dahulu.</div>";
        }
    }
    ?>

    <form action="proses_login.php" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Masukkan username" required>
        
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
        
        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>