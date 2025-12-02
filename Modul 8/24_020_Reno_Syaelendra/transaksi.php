<?php 
session_start(); 
include 'koneksi.php';
if($_SESSION['status'] != "login"){ header("location:login.php?pesan=belum_login"); exit; }

// Proses Simpan Transaksi
if(isset($_POST['simpan'])){
    $tanggal = $_POST['tanggal'];
    $pelanggan = $_POST['pelanggan'];
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    
    // Ambil harga barang
    $q_harga = mysqli_query($koneksi, "SELECT harga FROM barang WHERE id_barang='$barang'");
    $h = mysqli_fetch_array($q_harga);
    $total_harga = $h['harga'] * $jumlah;
    
    // Ambil nama barang dan pelanggan
    $q_nama_barang = mysqli_query($koneksi, "SELECT nama_barang FROM barang WHERE id_barang='$barang'");
    $nb = mysqli_fetch_array($q_nama_barang);
    
    $q_nama_pelanggan = mysqli_query($koneksi, "SELECT nama_pelanggan FROM pelanggan WHERE id_pelanggan='$pelanggan'");
    $np = mysqli_fetch_array($q_nama_pelanggan);
    
    // Simpan ke database
    $simpan = mysqli_query($koneksi, "INSERT INTO penjualan (tanggal, nama_pelanggan, nama_barang, jumlah, total_harga) 
                                       VALUES ('$tanggal', '".$np['nama_pelanggan']."', '".$nb['nama_barang']."', '$jumlah', '$total_harga')");
    
    if($simpan){
        echo "<script>alert('Transaksi Berhasil Disimpan!'); window.location='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Transaksi!');</script>";
    }
}

$labels = ""; $values = "";
$q_chart = mysqli_query($koneksi, "SELECT nama_barang, SUM(jumlah) as qty FROM penjualan GROUP BY nama_barang");
while($r = mysqli_fetch_array($q_chart)){
    $labels .= "'".$r['nama_barang']."',";
    $values .= $r['qty'].",";
}

// Ambil data untuk dropdown
$barang_data = mysqli_query($koneksi, "SELECT * FROM barang");
$pelanggan_data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Form Transaksi Penjualan</h2>
        <form method="post" style="background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="tanggal" required value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select name="pelanggan" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php 
                        mysqli_data_seek($pelanggan_data, 0);
                        while($p = mysqli_fetch_array($pelanggan_data)){ 
                        ?>
                        <option value="<?php echo $p['id_pelanggan']; ?>"><?php echo $p['nama_pelanggan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang" required id="barang-select" onchange="updateHarga()">
                        <option value="">-- Pilih Barang --</option>
                        <?php 
                        mysqli_data_seek($barang_data, 0);
                        while($b = mysqli_fetch_array($barang_data)){ 
                        ?>
                        <option value="<?php echo $b['id_barang']; ?>" data-harga="<?php echo $b['harga']; ?>"><?php echo $b['nama_barang']; ?> (Rp <?php echo number_format($b['harga']); ?>)</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" required min="1" onchange="updateTotal()">
                </div>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit" name="simpan" class="btn-download btn-excel" style="margin-right: 10px;">Simpan Transaksi</button>
            </div>
        </form>

        <h2>Statistik Penjualan</h2>
        <div style="width: 70%; margin: 0 auto;"> <canvas id="myChart"></canvas> </div>
        <br><hr><br>
        <h2>Riwayat Transaksi</h2>
        <table>
            <thead><tr><th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Barang</th><th>Jumlah</th><th>Total</th></tr></thead>
            <tbody>
                <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM penjualan ORDER BY tanggal DESC"); while($d=mysqli_fetch_array($data)){ ?>
                <tr><td><?php echo $no++; ?></td><td><?php echo $d['tanggal']; ?></td><td><?php echo $d['nama_pelanggan']; ?></td><td><?php echo $d['nama_barang']; ?></td><td><?php echo $d['jumlah']; ?></td><td>Rp <?php echo number_format($d['total_harga']); ?></td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, { type: 'bar', data: { labels: [<?php echo $labels; ?>], datasets: [{ label: 'Jumlah Terjual', data: [<?php echo $values; ?>], backgroundColor: '#36A2EB' }] } });
        
        function updateHarga() {
            var select = document.getElementById('barang-select');
            var harga = select.options[select.selectedIndex].getAttribute('data-harga');
            console.log('Harga: ' + harga);
        }
        
        function updateTotal() {
            console.log('Total updated');
        }
    </script>
</body>
</html>