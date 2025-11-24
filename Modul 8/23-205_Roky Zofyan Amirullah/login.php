<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 100px; background-color: #f4f4f4; }
        .login-box { background: white; padding: 30px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        .btn { background: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; padding: 10px; }
        .error { color: red; text-align: center; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="text-align:center; margin-top:0;">Login User</h2>
        <?php if(isset($_GET['pesan'])) { echo "<div class='error'>".$_GET['pesan']."</div>"; } ?>
        <form action="proses_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="btn" value="LOGIN">
        </form>
    </div>
</body>
</html>