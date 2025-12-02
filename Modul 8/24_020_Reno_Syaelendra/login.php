<!DOCTYPE html>
<html>
<head> <title>Login Sistem</title> </head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh; background:#e0e0e0; font-family:sans-serif;">
    <div style="width:320px; padding:30px; background:white; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.2);">
        <h2 align="center" style="margin-top:0; color:#003366;">Login User</h2>
        <form action="cek_login.php" method="post">
            <label>Username</label><br>
            <input type="text" name="username" style="width:100%; padding:10px; margin:5px 0 15px 0; box-sizing:border-box;" required><br>
            <label>Password</label><br>
            <input type="password" name="password" style="width:100%; padding:10px; margin:5px 0 15px 0; box-sizing:border-box;" required><br>
            <button type="submit" style="width:100%; padding:12px; background:#003366; color:white; border:none; cursor:pointer; font-weight:bold;">LOGIN</button>
        </form>
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="gagal"){ echo "<p style='color:red; text-align:center;'>Username/Password Salah!</p>"; }
            if($_GET['pesan']=="belum_login"){ echo "<p style='color:red; text-align:center;'>Silakan Login Dulu.</p>"; }
            if($_GET['pesan']=="logout"){ echo "<p style='color:green; text-align:center;'>Berhasil Logout.</p>"; }
        }
        ?>
    </div>
</body>
</html>