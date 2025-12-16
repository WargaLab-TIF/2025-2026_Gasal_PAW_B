<?php
$menu = [
    1 => ["nama" => "sempol", "harga" => 1000],
    2 => ["nama" => "molen", "harga" => 1500],
    3 => ["nama" => "donat", "harga" => 1000],
    4 => ["nama" => "Es Jus", "harga" => 5000],
    5 => ["nama" => "pentol jozz", "harga" => 5000],
];

session_start();


if (!isset($_SESSION['pesanan'])) {
    $_SESSION['pesanan'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pilihan = $_POST['pilihan'];
    $jumlah = $_POST['jumlah'];

    if (isset($menu[$pilihan])) {
        $_SESSION['pesanan'][] = [
            "nama" => $menu[$pilihan]['nama'],
            "harga" => $menu[$pilihan]['harga'],
            "jumlah" => $jumlah,
            "total" => $menu[$pilihan]['harga'] * $jumlah
        ];
    }

    if (isset($_POST['selesai'])) {
        $totalBayar = 0;
        echo "<h3>Daftar Pesanan:</h3>";
        foreach ($_SESSION['pesanan'] as $p) {
            echo "{$p['nama']} ({$p['jumlah']}x) = Rp {$p['total']}<br>";
            $totalBayar += $p['total'];
        }
        echo "<hr><b>Total Bayar: Rp $totalBayar</b>";
        session_destroy(); 
        exit;
    }
}
?>

<h2>=== Sistem Kasir Sederhana ===</h2>
<form method="post">
  <b>Daftar Menu:</b><br>
  <?php foreach ($menu as $key => $item) {
      echo "$key. {$item['nama']} - Rp {$item['harga']}<br>";
  } ?>

  <p>Pilih menu (1-5): <input type="number" name="pilihan" min="1" max="5" required></p>
  <p>Jumlah: <input type="number" name="jumlah" min="1" required></p>
  
  <input type="submit" value="Tambah Pesanan">
  <input type="submit" name="selesai" value="Selesai">
</form>

<?php
if (!empty($_SESSION['pesanan'])) {
    echo "<h3>Pesanan Sementara:</h3>";
    $totalSementara = 0;
    foreach ($_SESSION['pesanan'] as $p) {
        echo "{$p['nama']} ({$p['jumlah']}x) = Rp {$p['total']}<br>";
        $totalSementara += $p['total'];
    }
    echo "<hr><b>Total Sementara: Rp $totalSementara</b>";
}
?>
