<?php
// nyambung koneksi database dan helper (logika tetap)
require __DIR__ . '/koneksi.php';

// ambil ID dari query string dan validasi
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
  flash('err','ID tidak valid.');
  header('Location: ' . base_url() . 'supplier.php');
  exit;
}

// ngambil data supplier by id
$data = null;
$stmt = mysqli_prepare($conn, 'SELECT id, nama, telp, alamat FROM supplier WHERE id = ?');
if ($stmt) {
  mysqli_stmt_bind_param($stmt, 'i', $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $rid, $rnama, $rtelp, $ralamat);
  if (mysqli_stmt_fetch($stmt)) {
    $data = ['id' => $rid, 'nama' => $rnama, 'telp' => $rtelp, 'alamat' => $ralamat];
  }
  mysqli_stmt_close($stmt);
}
if (!$data) {
  flash('err','Data tidak ditemukan.');
  header('Location: ' . base_url() . 'supplier.php');
  exit;
}

// proses submit form update
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
  $nama = trim($_POST['nama'] ?? '');
  $telp = trim($_POST['telp'] ?? '');
  $alamat = trim($_POST['alamat'] ?? '');
  if ($nama === '' || $telp === '') {
    flash('err','Nama dan Telp wajib diisi.');
  } else {
    $upd = mysqli_prepare($conn, 'UPDATE supplier SET nama = ?, telp = ?, alamat = ? WHERE id = ?');
    if ($upd) {
      mysqli_stmt_bind_param($upd, 'sssi', $nama, $telp, $alamat, $id);
      mysqli_stmt_execute($upd);
      mysqli_stmt_close($upd);
    }
    flash('ok','Data supplier diupdate.');
    header('Location: ' . base_url() . 'supplier.php');
    exit;
  }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Data Master Supplier</title>
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<main class="wadah jarak" style="max-width:720px;">
  <!--judul  -->
  <div class="flex antara sejajar bawah3">
    <h3 class="bawah0" style="color:#2f89c8; font-weight:600;">Edit Data Master Supplier</h3>

  </div>

  <?php if ($m = flash('err')): ?><div class="pesan pesanerr"><?= htmlspecialchars($m) ?></div><?php endif; ?>

  <div class="kartu bayangan" style="border: none;"><div class="isi">
    <form method="post">
      <div class="bawah3" style="border:none;">
        <label class="label">Nama</label>
        <input class="input" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
      </div>
      <div class="bawah3">
        <label class="label">Telp</label>
        <input class="input" name="telp" value="<?= htmlspecialchars($data['telp']) ?>" required>
      </div>
      <div class="bawah3">
        <label class="label">Alamat</label>
        <input class="input" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>">
      </div>
      <div class="flex celah2">
        <button class="tombol sukses" type="submit">Update</button>
        <a class="tombol bahaya" href="<?= base_url() ?>supplier.php">Batal</a>
      </div>
    </form>
  </div></div>
</main>
</body>
</html>
