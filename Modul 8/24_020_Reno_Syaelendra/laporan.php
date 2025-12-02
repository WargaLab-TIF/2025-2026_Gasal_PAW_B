<?php 
session_start();
include 'koneksi.php';
// Proteksi Login
if($_SESSION['status'] != "login"){ header("location:login.php?pesan=belum_login"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Lengkap</title>
    <link rel="stylesheet" href="style.css">
    <!-- Library PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* CSS Tambahan agar cetakan rapi */
        .header-laporan { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #003366; padding-bottom: 10px; }
        .sub-judul { background-color: #eee; padding: 5px 10px; margin-top: 30px; font-weight: bold; border-left: 5px solid #003366; }
        table { margin-top: 10px; font-size: 12px; }
        th { background-color: #003366; color: white; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Halaman Laporan & Export</h2>
        <div class="action-buttons">
            <a href="export_excel.php" target="_blank" class="btn-download btn-excel"><i class="fas fa-file-excel"></i> Download Excel </a>
            <button onclick="cetakLangsung()" class="btn-download btn-back"><i class="fas fa-print"></i> Cetak</button>
        </div>

        <!-- AREA YANG AKAN DICETAK -->
        <div id="print-area" style="padding:20px; border: 1px solid #ccc; background: white;">
            
            <div class="header-laporan">
                <h2 style="margin:0;">LAPORAN REKAPITULASI SISTEM</h2>
                <p style="margin:5px 0;">Dicetak oleh: <b><?php echo $_SESSION['nama']; ?></b> | Tanggal: <?php echo date('d-m-Y H:i'); ?></p>
            </div>

            <!-- 1. LAPORAN PENJUALAN -->
            <div class="sub-judul">A. LAPORAN PENJUALAN & OMZET</div>
            <?php 
            $q = mysqli_query($koneksi, "SELECT SUM(total_harga) as omzet FROM penjualan");
            $row = mysqli_fetch_assoc($q);
            ?>
            <p><b>Total Omzet: Rp <?php echo number_format($row['omzet']); ?></b></p>
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <thead><tr><th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Barang</th><th>Qty</th><th>Total</th></tr></thead>
                <tbody>
                    <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM penjualan ORDER BY tanggal DESC"); 
                    while($d=mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['tanggal']; ?></td>
                        <td><?php echo $d['nama_pelanggan']; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td align="center"><?php echo $d['jumlah']; ?></td>
                        <td align="right">Rp <?php echo number_format($d['total_harga']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- 2. DATA SUPPLIER -->
            <div class="sub-judul">B. DATA SUPPLIER</div>
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <thead><tr><th>No</th><th>Nama Supplier</th><th>Alamat</th><th>Telepon</th></tr></thead>
                <tbody>
                    <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM supplier"); while($d=mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_supplier']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['telepon']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- 3. DATA PELANGGAN -->
            <div class="sub-judul">C. DATA PELANGGAN</div>
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <thead><tr><th>No</th><th>Nama Pelanggan</th><th>Alamat</th><th>No HP</th></tr></thead>
                <tbody>
                    <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM pelanggan"); while($d=mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_pelanggan']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['hp']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- 4. DATA USER -->
            <div class="sub-judul">D. DATA USER SISTEM</div>
            <table width="100%" border="1" cellspacing="0" cellpadding="5">
                <thead><tr><th>No</th><th>Nama Lengkap</th><th>Username</th><th>Level</th></tr></thead>
                <tbody>
                    <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM user"); while($d=mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td><?php echo ($d['level']==1)?"Admin":"User"; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <br>
            <p align="right" style="margin-top:20px;">Mengetahui,<br><br><br><b>( Pimpinan )</b></p>

        </div>
    </div>
    <script>
        function cetakLangsung() {
            var printContents = document.getElementById('print-area').innerHTML;
            var originalContents = document.body.innerHTML;
            
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            
            // Reload untuk mengembalikan semua event listener
            location.reload();
        }
    </script>
</body>
</html>