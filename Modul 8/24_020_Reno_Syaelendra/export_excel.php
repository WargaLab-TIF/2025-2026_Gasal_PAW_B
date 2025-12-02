<?php
include 'koneksi.php';

// Header agar dibaca sebagai Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Lengkap.xls");
?>

<h2 style="text-align:center">LAPORAN REKAPITULASI SISTEM</h2>
<p style="text-align:center">Dicetak Tanggal: <?php echo date('d-m-Y'); ?></p>

<!-- 1. TABEL PENJUALAN -->
<h3>A. DATA PENJUALAN</h3>
<table border="1">
    <thead>
        <tr style="background-color:#eee;">
            <th>No</th><th>Tanggal</th><th>Pelanggan</th><th>Barang</th><th>Jumlah</th><th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1; $total=0;
        $data = mysqli_query($koneksi,"SELECT * FROM penjualan");
        while($d = mysqli_fetch_array($data)){
            $total += $d['total_harga'];
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td><?php echo $d['nama_pelanggan']; ?></td>
            <td><?php echo $d['nama_barang']; ?></td>
            <td><?php echo $d['jumlah']; ?></td>
            <td><?php echo $d['total_harga']; ?></td>
        </tr>
        <?php } ?>
        <tr style="background-color:#ddd; font-weight:bold;">
            <td colspan="5" align="right">TOTAL OMZET</td>
            <td><?php echo $total; ?></td>
        </tr>
    </tbody>
</table>
<br>

<!-- 2. TABEL SUPPLIER -->
<h3>B. DATA SUPPLIER</h3>
<table border="1">
    <thead>
        <tr style="background-color:#eee;">
            <th>No</th><th>Nama Supplier</th><th>Alamat</th><th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM supplier"); while($d=mysqli_fetch_array($data)){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_supplier']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['telepon']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br>

<!-- 3. TABEL PELANGGAN -->
<h3>C. DATA PELANGGAN</h3>
<table border="1">
    <thead>
        <tr style="background-color:#eee;">
            <th>No</th><th>Nama Pelanggan</th><th>Alamat</th><th>No HP</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM pelanggan"); while($d=mysqli_fetch_array($data)){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama_pelanggan']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['hp']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<br>

<!-- 4. TABEL USER -->
<h3>D. DATA USER SISTEM</h3>
<table border="1">
    <thead>
        <tr style="background-color:#eee;">
            <th>No</th><th>Nama Lengkap</th><th>Username</th><th>Level</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $data=mysqli_query($koneksi,"SELECT * FROM user"); while($d=mysqli_fetch_array($data)){ ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['username']; ?></td>
            <td><?php echo ($d['level']==1)?"Admin":"User"; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>