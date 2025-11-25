<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../../koneksi.php';

$level_pengguna = isset($_SESSION['level']) ? (int)$_SESSION['level'] : 0;
if ($level_pengguna !== 1) {
    header('Location: ../home/index.php');
    exit;
}

$tabel_kandidat = ['user', 'users', 'tb_user', 'pengguna'];
$tabel_user = null;
if (isset($db) && $db) {
    $daftar = "('" . implode("','", $tabel_kandidat) . "')";
    $sql = "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME IN $daftar LIMIT 1";
    $pernyataan = mysqli_prepare($koneksi, $sql);
    if ($pernyataan) {
        mysqli_stmt_bind_param($pernyataan, 's', $db);
        mysqli_stmt_execute($pernyataan);
        $hasil_tabel = mysqli_stmt_get_result($pernyataan);
        if ($hasil_tabel) {
            $baris_tabel = mysqli_fetch_assoc($hasil_tabel);
            if ($baris_tabel && isset($baris_tabel['TABLE_NAME'])) {
                $tabel_user = $baris_tabel['TABLE_NAME'];
            }
        }
    }
}

$semua_kolom = [];
$kolom_id_kandidat = ['id','id_user','user_id'];
$kolom_id = null;
$kolom_password_kandidat = ['password','pass','kata_sandi'];
$kolom_password = null;
$kolom_level = null;
if ($tabel_user) {
    $cek_kol = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$tabel_user`");
    if ($cek_kol) {
        while ($c = mysqli_fetch_assoc($cek_kol)) { $semua_kolom[] = $c['Field']; }
        foreach ($kolom_id_kandidat as $k) { if (in_array($k, $semua_kolom, true)) { $kolom_id = $k; break; } }
        foreach ($kolom_password_kandidat as $k) { if (in_array($k, $semua_kolom, true)) { $kolom_password = $k; break; } }
        if (in_array('level', $semua_kolom, true)) { $kolom_level = 'level'; }
    }
}

if ($tabel_user && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $aksi = $_POST['aksi'] ?? '';
    if ($aksi === 'tambah') {
        $kolom_input = array_values(array_filter($semua_kolom, function($x) use ($kolom_id){ return strtolower($x) !== strtolower((string)$kolom_id); }));
        if (count($kolom_input) > 0) {
            $placeholder = implode(',', array_fill(0, count($kolom_input), '?'));
            $sql = "INSERT INTO `$tabel_user` (`".implode('`,`', $kolom_input)."`) VALUES ($placeholder)";
            $stm = mysqli_prepare($koneksi, $sql);
            if ($stm) {
                $tipe = str_repeat('s', count($kolom_input));
                $nilai = [];
                foreach ($kolom_input as $ki) {
                    if ($kolom_password && strtolower($ki) === strtolower($kolom_password)) {
                        $val = $_POST[$ki] ?? '';
                        $nilai[] = ($val !== '') ? md5($val) : '';
                    } else {
                        $nilai[] = $_POST[$ki] ?? '';
                    }
                }
                mysqli_stmt_bind_param($stm, $tipe, ...$nilai);
                mysqli_stmt_execute($stm);
            }
        }
        header('Location: index.php'); exit;
    } elseif ($aksi === 'ubah' && $kolom_id) {
        $id_nilai = $_POST[$kolom_id] ?? '';
        if ($id_nilai !== '') {
            $kolom_set = [];
            $nilai = [];
            foreach ($semua_kolom as $ks) {
                if (strtolower($ks) === strtolower($kolom_id)) { continue; }
                if ($kolom_password && strtolower($ks) === strtolower($kolom_password)) {
                    $val = $_POST[$ks] ?? '';
                    if ($val === '') { continue; }
                    $kolom_set[] = "`$ks` = ?";
                    $nilai[] = md5($val);
                } else {
                    $kolom_set[] = "`$ks` = ?";
                    $nilai[] = $_POST[$ks] ?? '';
                }
            }
            if (count($kolom_set) > 0) {
                $sql = "UPDATE `$tabel_user` SET ".implode(', ', $kolom_set)." WHERE `$kolom_id` = ?";
                $stm = mysqli_prepare($koneksi, $sql);
                if ($stm) {
                    $tipe = str_repeat('s', count($nilai)) . 's';
                    $nilai[] = $id_nilai;
                    mysqli_stmt_bind_param($stm, $tipe, ...$nilai);
                    mysqli_stmt_execute($stm);
                }
            }
        }
        header('Location: index.php'); exit;
    } elseif ($aksi === 'hapus' && $kolom_id) {
        $id_nilai = $_POST[$kolom_id] ?? '';
        if ($id_nilai !== '') {
            $stm = mysqli_prepare($koneksi, "DELETE FROM `$tabel_user` WHERE `$kolom_id` = ?");
            if ($stm) { mysqli_stmt_bind_param($stm, 's', $id_nilai); mysqli_stmt_execute($stm); }
        }
        header('Location: index.php'); exit;
    }
}
$data_baris = [];
$daftar_kolom = [];
if ($tabel_user) {
    $hasil = @mysqli_query($koneksi, "SELECT * FROM `$tabel_user` LIMIT 500");
    if ($hasil) {
        $daftar_kolom = array_map(function ($col) { return $col->name; }, mysqli_fetch_fields($hasil));
        $daftar_kolom = array_values(array_filter($daftar_kolom, function($c){ return strtolower($c) !== 'id'; }));
        while ($baris = mysqli_fetch_assoc($hasil)) { $data_baris[] = $baris; }
    }
}

$daftar_kolom_tanggal = ['tanggal','tgl','date','created_at','updated_at'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="p-4">
<?php include '../../layouts/header.php'; ?>

<div class="container-fluid mt-3">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="mb-0">Master User</h5>
        <span class="badge bg-primary">Total: <?php echo count($data_baris); ?></span>
    </div>

    <?php if (!$tabel_user): ?>
        <div class="alert alert-warning">Tabel user tidak ditemukan. Coba salah satu nama: <code>user</code>, <code>users</code>, <code>tb_user</code>, <code>pengguna</code>.</div>
    <?php elseif (!$data_baris): ?>
        <div class="alert alert-info">Belum ada data user.</div>
    <?php endif; ?>

    <?php if ($tabel_user && $semua_kolom): ?>
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Tambah User</span>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#formTambahUser">Tampilkan/Sembunyikan</button>
        </div>
        <div class="card-body collapse" id="formTambahUser">
            <form method="post">
                <input type="hidden" name="aksi" value="tambah">
                <div class="row g-2">
                    <?php foreach ($semua_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
                    <div class="col-md-3">
                        <label class="form-label small"><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?></label>
                        <?php if ($kolom_level && strtolower($kol) === 'level'): ?>
                        <select name="<?php echo htmlspecialchars($kol); ?>" class="form-select form-select-sm">
                            <option value="">-- Pilih Level --</option>
                            <option value="1">admin</option>
                            <option value="2">kasir</option>
                        </select>
                        <?php else: ?>
                        <input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" placeholder="Isi <?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?>">
                        <?php endif; ?>
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

    <?php if ($daftar_kolom): ?>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <?php foreach ($daftar_kolom as $kol): ?>
                                <th><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?></th>
                            <?php endforeach; ?>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $baris_edit = null;
                            $edit_id = isset($_GET['edit_id']) ? $_GET['edit_id'] : null;
                            if ($edit_id && $kolom_id) {
                                foreach ($data_baris as $b) { if ((string)($b[$kolom_id] ?? '') === (string)$edit_id) { $baris_edit = $b; break; } }
                            }
                            if ($baris_edit && $kolom_id):
                        ?>
                        <tr class="table-warning">
                            <td colspan="100%">
                                <form method="post">
                                    <input type="hidden" name="aksi" value="ubah">
                                    <input type="hidden" name="<?php echo htmlspecialchars($kolom_id); ?>" value="<?php echo htmlspecialchars($baris_edit[$kolom_id]); ?>">
                                    <div class="row g-2">
                                        <?php foreach ($semua_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
                                        <div class="col-md-3">
                                            <label class="form-label small"><?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?></label>
                                            <?php if ($kolom_level && strtolower($kol) === 'level'): ?>
                                            <?php $nilai_lvl = (string)($baris_edit[$kol] ?? ''); ?>
                                            <select name="<?php echo htmlspecialchars($kol); ?>" class="form-select form-select-sm">
                                                <option value="">-- Pilih Level --</option>
                                                <option value="1" <?php echo ($nilai_lvl === '1') ? 'selected' : ''; ?>>admin</option>
                                                <option value="2" <?php echo ($nilai_lvl === '2') ? 'selected' : ''; ?>>kasir</option>
                                            </select>
                                            <?php else: ?>
                                            <input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" value="<?php echo htmlspecialchars((string)($baris_edit[$kol] ?? '')); ?>" placeholder="Isi <?php echo htmlspecialchars(ucwords(str_replace('_',' ', $kol))); ?>">
                                            <?php endif; ?>
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
                        <?php $no = 1; foreach ($data_baris as $baris): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <?php foreach ($daftar_kolom as $kol): $nilai = $baris[$kol] ?? ''; ?>
                                    <td>
                                        <?php 
                                            if (strtolower($kol) === 'level') {
                                                $lvl = (int)$nilai;
                                                echo htmlspecialchars($lvl === 1 ? 'admin' : ($lvl === 2 ? 'kasir' : (string)$nilai));
                                            } elseif (in_array(strtolower($kol), $daftar_kolom_tanggal, true)) {
                                                echo htmlspecialchars(date('d M Y', strtotime((string)$nilai)));
                                            } else {
                                                echo htmlspecialchars((string)$nilai);
                                            }
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                                <td class="text-nowrap">
                                    <?php if ($kolom_id && isset($baris[$kolom_id])): $idv = (string)$baris[$kolom_id]; ?>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php include '../../layouts/footer.php'; ?>
</body>
</html>
