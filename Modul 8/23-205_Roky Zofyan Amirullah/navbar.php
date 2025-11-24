<style>
    
    .navbar {
        overflow: hidden;
        background-color: #333;
        font-family: Arial, sans-serif;
        margin-bottom: 20px;
    }
    
    .navbar a {
        float: left;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }
    
    
    .brand {
        float: left;
        display: block;
        color: #fff;
        font-weight: bold;
        padding: 14px 16px;
        background-color: #4CAF50; 
    }

    
    .navbar-right {
        float: right;
    }
    
    
    .btn-logout {
        background-color: #f44336; 
    }
    .btn-logout:hover {
        background-color: #d32f2f;
    }

    
    .user-display {
        float: right;
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        background-color: #444; 
        cursor: default; 
    }
</style>

<div class="navbar">
    <div class="brand">SISTEM PENJUALAN</div>
    
    <a href="admin.php">Home</a>

    <?php if($_SESSION['level'] == 1) { ?>
        <a href="data_user.php">Data Master</a>
    <?php } ?>

    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>

    <a href="logout.php" class="navbar-right btn-logout">Logout</a>
    
    <div class="user-display">
        Halo, <b><?php echo $_SESSION['nama']; ?></b>
    </div>
</div>