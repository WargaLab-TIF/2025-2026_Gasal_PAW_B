<?php
session_start();
require_once '../../koneksi.php';

$level_pengguna = isset($_SESSION['level']) ? (int)$_SESSION['level'] : 0;
if ($level_pengguna !== 1) {
    header('Location: ../home/index.php');
    exit;
}

$nama_tabel = 'supplier';
$semua_kolom = [];
$kolom_id_kandidat = ['id','id_supplier','supplier_id'];
$kolom_id = null;

$cek_kol = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$nama_tabel`");
if ($cek_kol) {
    while ($c = mysqli_fetch_assoc($cek_kol)) { $semua_kolom[] = $c['Field']; }
    foreach ($kolom_id_kandidat as $k) { if (in_array($k, $semua_kolom, true)) { $kolom_id = $k; break; } }
}

if ($cek_kol && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'] ?? '';
    if ($aksi === 'tambah') {
        $kolom_input = array_values(array_filter($semua_kolom, function($x) use ($kolom_id){ return strtolower($x) !== strtolower((string)$kolom_id); }));
        if (count($kolom_input) > 0) {
            $placeholder = implode(',', array_fill(0, count($kolom_input), '?'));
            $sql = "INSERT INTO `$nama_tabel` (`".implode('`,`', $kolom_input)."`) VALUES ($placeholder)";
            $stm = mysqli_prepare($koneksi, $sql);
            if ($stm) {
                $tipe = str_repeat('s', count($kolom_input));
                $nilai = [];
                foreach ($kolom_input as $ki) { $nilai[] = $_POST[$ki] ?? ''; }
                mysqli_stmt_bind_param($stm, $tipe, ...$nilai);
                mysqli_stmt_execute($stm);
            }
        }
        header('Location: index.php'); exit;
    } elseif ($aksi === 'ubah' && $kolom_id) {
        $id_nilai = $_POST[$kolom_id] ?? '';
        $kolom_set = array_values(array_filter($semua_kolom, function($x) use ($kolom_id){ return strtolower($x) !== strtolower($kolom_id); }));
        if ($id_nilai !== '' && count($kolom_set) > 0) {
            $set_bagian = implode(', ', array_map(function($x){ return "`$x` = ?"; }, $kolom_set));
            $sql = "UPDATE `$nama_tabel` SET $set_bagian WHERE `$kolom_id` = ?";
            $stm = mysqli_prepare($koneksi, $sql);
            if ($stm) {
                $tipe = str_repeat('s', count($kolom_set)) . 's';
                $nilai = [];
                foreach ($kolom_set as $ks) { $nilai[] = $_POST[$ks] ?? ''; }
                $nilai[] = $id_nilai;
                mysqli_stmt_bind_param($stm, $tipe, ...$nilai);
                mysqli_stmt_execute($stm);
            }
        }
        header('Location: index.php'); exit;
    } elseif ($aksi === 'hapus' && $kolom_id) {
        $id_nilai = $_POST[$kolom_id] ?? '';
        if ($id_nilai !== '') {
            $stm = mysqli_prepare($koneksi, "DELETE FROM `$nama_tabel` WHERE `$kolom_id` = ?");
            if ($stm) { mysqli_stmt_bind_param($stm, 's', $id_nilai); mysqli_stmt_execute($stm); }
        }
        header('Location: index.php'); exit;
    }
}


$rows = [];
$columns = [];
$result = @mysqli_query($koneksi, "SELECT * FROM `$nama_tabel` LIMIT 500");
if ($result) {
    $columns = array_map(function ($col) { return $col->name; }, mysqli_fetch_fields($result));
    $columns = array_values(array_filter($columns, function($c){
        $lc = strtolower($c);
        return !in_array($lc, ['id','id_supplier','supplier_id'], true);
    }));
    while ($row = mysqli_fetch_assoc($result)) { $rows[] = $row; }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="p-4">
<?php include '../../layouts/header.php'; ?>

<div class="container-fluid mt-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0">Data Supplier</h5>
        <span class="badge bg-primary">Total: <?php echo count($rows); ?></span>
    </div>

    <?php if (!$result): ?>
        <div class="alert alert-warning">Tidak dapat mengambil data dari tabel <code>supplier</code>. Pastikan tabelnya ada di database.</div>
    <?php endif; ?>

    <?php if ($cek_kol && $semua_kolom): ?>
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Tambah Supplier</span>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#formTambahSup">Tampilkan/Sembunyikan</button>
        </div>
        <div class="card-body collapse" id="formTambahSup">
            <form method="post">
                <input type="hidden" name="aksi" value="tambah">
                <div class="row g-2">
                    <?php foreach ($semua_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
                    <div class="col-md-3">
                        <label class="form-label small"><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?></label>
                        <input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" placeholder="Isi <?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <?php foreach ($columns as $col): ?>
                                <th><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $col))); ?></th>
                            <?php endforeach; ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($rows): ?>
                            <?php
                                $edit_id = isset($_GET['edit_id']) ? $_GET['edit_id'] : null;
                                $row_edit = null;
                                if ($edit_id && $kolom_id) {
                                    foreach ($rows as $rr) { if ((string)($rr[$kolom_id] ?? '') === (string)$edit_id) { $row_edit = $rr; break; } }
                                }
                                if ($row_edit && $kolom_id):
                            ?>
                            <tr class="table-warning">
                                <td colspan="100%">
                                    <form method="post">
                                        <input type="hidden" name="aksi" value="ubah">
                                        <input type="hidden" name="<?php echo htmlspecialchars($kolom_id); ?>" value="<?php echo htmlspecialchars($row_edit[$kolom_id]); ?>">
                                        <div class="row g-2">
                                            <?php foreach ($semua_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
                                            <div class="col-md-3">
                                                <label class="form-label small"><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?></label>
                                                <input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" value="<?php echo htmlspecialchars((string)($row_edit[$kol] ?? '')); ?>">
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                                            <a href="index.php" class="btn btn-sm btn-secondary">Batal</a>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php $no = 1; foreach ($rows as $r): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <?php foreach ($columns as $col): ?>
                                        <td><?php echo htmlspecialchars((string)($r[$col] ?? '')); ?></td>
                                    <?php endforeach; ?>
                                    <td class="text-nowrap">
                                        <?php if ($kolom_id && isset($r[$kolom_id])): $idv = (string)$r[$kolom_id]; ?>
                                            <a href="?edit_id=<?php echo urlencode($idv); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i></a>
                                            <form method="post" class="d-inline" onsubmit="return confirm('Hapus data ini?');">
                                                <input type="hidden" name="aksi" value="hapus">
                                                <input type="hidden" name="<?php echo htmlspecialchars($kolom_id); ?>" value="<?php echo htmlspecialchars($idv); ?>">
                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?php echo count($columns) + 1; ?>" class="text-center">Belum ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../../layouts/footer.php'; ?>
</body>
</html>
