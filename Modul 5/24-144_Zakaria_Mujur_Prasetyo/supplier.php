<?php
// koneksi database dan helper
require __DIR__ . '/koneksi.php';

// aksi hapus data supplier (logika tidak diubah)
if (($_GET['action'] ?? '') === 'delete') {
  $id = (int)($_GET['id'] ?? 0);
  if ($id > 0) {
    $stmt = mysqli_prepare($conn, 'DELETE FROM supplier WHERE id = ?');
    if ($stmt) {
      mysqli_stmt_bind_param($stmt, 'i', $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      flash('ok', 'Supplier dihapus.');
    }
  }
  header('Location: ' . base_url() . 'supplier.php');
  exit;
}

// ngambil data supplier untuk tabel
$rows = [];
$res = mysqli_query($conn, 'SELECT id, nama, telp, alamat FROM supplier ORDER BY id ASC');
if ($res) {
  $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
  mysqli_free_result($res);
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Master Supplier</title>
  <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<main class="wadah jarak">
  <!-- Bar judul + tombol kanan: format seperti contoh -->
  <div class="flex antara sejajar bawah3">
    <h3 class="bawah0" style="color:#2f89c8; font-weight:600;">Data Master Supplier</h3>
    <a href="<?= base_url() ?>supplier_add.php" class="tombol sukses kecil">Tambah Data</a>
  </div>

  <!-- Flash Pesan -->
  <?php if ($m = flash('ok')): ?><div class="pesan pesanok"><?= htmlspecialchars($m) ?></div><?php endif; ?>
  <?php if ($m = flash('err')): ?><div class="pesan pesanerr"><?= htmlspecialchars($m) ?></div><?php endif; ?>

  <!-- Kartu tabel -->
  <div class="kartu bayangan" style="border: none;">
    <div class="isi">
      <div class="tabelres">
        <table class="tabel tabelselang tengahvert">
          <thead>
            <tr>
              <th style="width:60px; background-color: #60caffbe;">No</th>
              <th style="width:60px; background-color: #60caffbe;">Nama</th>
              <th style="width:60px; background-color: #60caffbe;">Telp</th>
              <th style="width:60px; background-color: #60caffbe;">Alamat</th>
              <th style="width:60px; background-color: #60caffbe;">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!$rows): ?>
            <tr><td colspan="5" class="tengah redup">Belum ada data</td></tr>
            <?php else: ?>
              <?php $no=1; foreach ($rows as $r): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($r['nama']) ?></td>
                <td><?= htmlspecialchars($r['telp']) ?></td>
                <td><?= htmlspecialchars($r['alamat']) ?></td>
                <td>
                  <a class="tombol kecil awas" href="<?= base_url() ?>supplier_edit.php?id=<?= (int)$r['id'] ?>">Edit</a>
                  <a class="tombol kecil bahaya" href="<?= base_url() ?>supplier.php?action=delete&id=<?= (int)$r['id'] ?>" onclick="return confirm('Anda yakin akan menghapus supplier ini?')">Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
</body>
</html>
