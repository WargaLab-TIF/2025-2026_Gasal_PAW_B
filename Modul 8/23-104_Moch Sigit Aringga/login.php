<?php
session_start();
include "config.php"; 

// 1. CEK STATUS: Jika sudah login, langsung lempar ke dashboard
// Kita gunakan kunci 'status' agar konsisten dengan auth.php
if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    if($_SESSION['level'] == 1) { 
        header("Location: admin/dashboard.php"); 
    } else { 
        header("Location: kasir/dashboard.php"); 
    }
    exit;
}

if(isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = md5($_POST['password']); 

    // 2. QUERY: Menggunakan Prepared Statement (Aman dari Hack)
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if($data) {
        // 3. SET SESSION: Ini bagian PENTING agar auth.php bekerja
        session_regenerate_id(true); // Mencegah pembajakan session

        $_SESSION['status']   = "login";      // <--- KUNCI UTAMA (Harus sama dgn auth.php)
        $_SESSION['id_user']  = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['level']    = $data['level'];

        // 4. REDIRECT: Arahkan sesuai level
        if($data['level'] == 1){
            header("Location: admin/dashboard.php"); 
        } elseif($data['level'] == 2){
            header("Location: kasir/dashboard.php"); 
        } else {
            // Default jika level lain
            header("Location: kasir/dashboard.php"); 
        }
        exit;

    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistem POS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-login {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .card-header-login {
            background: transparent;
            border-bottom: none;
            padding-bottom: 0;
            text-align: center;
            padding-top: 30px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            padding: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background-color: #2e59d9;
        }
    </style>
</head>
<body>

<div class="container px-4">
    <div class="card card-login bg-white mx-auto">
        
        <div class="card-header card-header-login">
            <div class="mb-2">
                <i class="bi bi-shield-lock-fill text-primary" style="font-size: 3rem;"></i>
            </div>
            <h4 class="fw-bold text-secondary">Silakan Login</h4>
            <p class="text-muted small">Masukkan kredensial Anda untuk masuk</p>
        </div>

        <div class="card-body p-4 pt-2">
            
            <?php if(isset($error)) { ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div><?= $error ?></div>
                </div>
            <?php } ?>

            <?php 
            if(isset($_GET['pesan']) && $_GET['pesan'] == 'belum_login'){
                echo '<div class="alert alert-warning small text-center">Silakan login untuk mengakses halaman tersebut.</div>';
            }
            if(isset($_GET['pesan']) && $_GET['pesan'] == 'logout'){
                echo '<div class="alert alert-success small text-center">Anda berhasil logout.</div>';
            }
            ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-muted">USERNAME</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control border-start-0 bg-light" placeholder="Username" required autofocus>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-muted">PASSWORD</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" id="passInput" class="form-control border-start-0 border-end-0 bg-light" placeholder="Password" required>
                        <button class="btn btn-light border border-start-0" type="button" onclick="togglePassword()">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" name="login" class="btn btn-primary w-100 rounded-pill shadow-sm mb-3">
                    MASUK SEKARANG
                </button>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">Sistem Point of Sale v1.0 &copy; 2025</small>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var input = document.getElementById("passInput");
        var icon = document.getElementById("toggleIcon");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        } else {
            input.type = "password";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    }
</script>

</body>
</html>