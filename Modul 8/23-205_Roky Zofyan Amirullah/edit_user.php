<?php 
session_start(); 
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login") { 
    header("location:login.php"); 
    exit; 
}

include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");
while($d = mysqli_fetch_array($data)){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .card {
            background-color: white;
            width: 450px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h3 {
            color: #333;
            margin-top: 0;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-weight: bold;
            font-size: 14px;
        }
        input[type="text"], 
        input[type="password"], 
        textarea, 
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .btn-update {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .btn-update:hover {
            background-color: #45a049;
        }
        .btn-batal {
            display: block;
            text-align: center;
            background-color: #d32f2f;
            color: white;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .btn-batal:hover {
            background-color: #b71c1c;
        }
    </style>
</head>
<body>

    <div class="card">
        <h3>Edit Data User</h3>
        
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">

            <label>Username</label> 
            <input type="text" name="username" value="<?php echo $d['username']; ?>" required>

            <label>Password <small style="font-weight:normal; color:#888;">(Isi jika ingin ganti)</small></label> 
            <input type="password" name="password" placeholder="Password baru...">

            <label>Nama Lengkap</label> 
            <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required>

            <label>Alamat</label> 
            <textarea name="alamat" rows="3"><?php echo $d['alamat']; ?></textarea>

            <label>Nomor HP</label> 
            <input type="text" name="hp" value="<?php echo $d['hp']; ?>">

            <label>Jenis User</label>
            <select name="level">
                <option value="1" <?php if($d['level']==1) echo "selected"; ?>>Admin</option>
                <option value="2" <?php if($d['level']==2) echo "selected"; ?>>User Biasa</option>
            </select>
            
            <br><br>

            <input type="submit" class="btn-update" value="Update Data">
            <a href="data_user.php" class="btn-batal">Batal</a>
        </form>
    </div>

</body>
</html>
<?php } ?>