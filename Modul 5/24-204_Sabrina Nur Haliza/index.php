<?php
// Menghubungkan file ini dengan file koneksi database
include 'koneksi.php';

// Mengambil semua data dari tabel supplier, diurutkan dari id terbesar ke terkecil
$query = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        /* Styling dasar tabel */
        table { 
            border-collapse: collapse; /* Menggabungkan garis border tabel */
            width: 70%; 
            margin: 20px auto; /* Posisi tabel di tengah halaman */
        }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #f2f2f2; /* Warna abu muda pada header */
        }

        /* Tombol dasar */
        a.button {
            background: green; 
            color: white; 
            padding: 6px 10px; 
            text-decoration: none;
            border-radius: 5px; 
            margin-right: 5px;
        }

        /* Tombol edit dan hapus dengan warna berbeda */
        a.edit { background: orange; }
        a.hapus { background: red; }
    </style>
</head>
<body>
    <h2 align="center">Data Master Supplier</h2>

    <!-- Tombol tambah data -->
    <div style="text-align:center; margin-bottom:10px;">
        <a href="tambah.php" class="button">Tambah Data</a>
    </div>

    <!-- Tabel data supplier -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        // Nomor urut awal
        $no = 1;

        // Cek apakah query menghasilkan data
        if (mysqli_num_rows($query) > 0) {
            // Perulangan untuk menampilkan setiap baris data supplier
            while ($data = mysqli_fetch_assoc($query)) {
                // Menampilkan setiap data ke dalam tabel dengan pengamanan XSS
                echo "<tr>
                        <td>$no</td>
                        <td>" . htmlspecialchars($data['nama']) . "</td>
                        <td>" . htmlspecialchars($data['telp']) . "</td>
                        <td>" . htmlspecialchars($data['alamat']) . "</td>
                        <td>
                            <!-- Tombol edit dan hapus -->
                            <a href='edit.php?id={$data['id']}' class='button edit'>Edit</a>
                            <a href='hapus.php?id={$data['id']}' class='button hapus' 
                               onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++; // Naikkan nomor urut
            }
        } else {
            // Jika tidak ada data di tabel
            echo "<tr><td colspan='5' align='center'>Belum ada data supplier.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
