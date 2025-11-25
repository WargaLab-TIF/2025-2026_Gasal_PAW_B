<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once '../../koneksi.php';

$level_pengguna = isset($_SESSION['level']) ? (int)$_SESSION['level'] : 0;
if ($level_pengguna !== 1) {
	header('Location: ../home/index.php');
	exit;
}

$tabel_kandidat = ['barang', 'tb_barang', 'items', 'product', 'products'];
$tabel_barang = null;
foreach ($tabel_kandidat as $nama_tabel) {
	$hasil = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$nama_tabel`");
	if ($hasil) { $tabel_barang = $nama_tabel; break; }
}

$daftar_kolom = [];
if ($tabel_barang) {
	$hasil_kol = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$tabel_barang`");
	if ($hasil_kol) {
		while ($c = mysqli_fetch_assoc($hasil_kol)) { $daftar_kolom[] = $c['Field']; }
	}
}

$kolom_id_kandidat = ['id','id_barang','barang_id'];
$kolom_id = null;
foreach ($kolom_id_kandidat as $k) { if (in_array($k, $daftar_kolom, true)) { $kolom_id = $k; break; } }

if ($tabel_barang && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$aksi = $_POST['aksi'] ?? '';
	if ($aksi === 'tambah') {
		$kolom_input = array_values(array_filter($daftar_kolom, function($x) use ($kolom_id){ return strtolower($x) !== strtolower((string)$kolom_id); }));
		if (count($kolom_input) > 0) {
			$placeholder = implode(',', array_fill(0, count($kolom_input), '?'));
			$sql = "INSERT INTO `$tabel_barang` (`".implode('`,`', $kolom_input)."`) VALUES ($placeholder)";
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
		$kolom_set = array_values(array_filter($daftar_kolom, function($x) use ($kolom_id){ return strtolower($x) !== strtolower($kolom_id); }));
		if ($id_nilai !== '' && count($kolom_set) > 0) {
			$set_bagian = implode(', ', array_map(function($x){ return "`$x` = ?"; }, $kolom_set));
			$sql = "UPDATE `$tabel_barang` SET $set_bagian WHERE `$kolom_id` = ?";
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
			$stm = mysqli_prepare($koneksi, "DELETE FROM `$tabel_barang` WHERE `$kolom_id` = ?");
			if ($stm) { mysqli_stmt_bind_param($stm, 's', $id_nilai); mysqli_stmt_execute($stm); }
		}
		header('Location: index.php'); exit;
	}
}

$data_baris = [];
if ($tabel_barang) {
	$hasil = @mysqli_query($koneksi, "SELECT * FROM `$tabel_barang` LIMIT 500");
	if ($hasil) {
		if (!$daftar_kolom) { $daftar_kolom = array_map(function ($obj_kolom) { return $obj_kolom->name; }, mysqli_fetch_fields($hasil)); }
		while ($baris = mysqli_fetch_assoc($hasil)) { $data_baris[] = $baris; }
	}
}

$daftar_kolom_uang = ['harga','price','total','subtotal'];
$daftar_kolom_tanggal = ['tanggal','tgl','date','created_at','updated_at'];

$kolom_supplier_id_kandidat = ['id_supplier','supplier_id'];
$kolom_supplier_id = null;
foreach ($kolom_supplier_id_kandidat as $k) {
	if (in_array($k, $daftar_kolom, true)) { $kolom_supplier_id = $k; break; }
}

$peta_supplier = [];
$daftar_supplier_semua = [];
if ($kolom_supplier_id) {
	$tabel_supplier_kandidat = ['supplier','suppliers','tb_supplier'];
	$tabel_supplier = null;
	foreach ($tabel_supplier_kandidat as $t) {
		$cek = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$t`");
		if ($cek) { $tabel_supplier = $t; break; }
	}
	if ($tabel_supplier) {
		$kolom_supplier_fields = [];
		$cek2 = @mysqli_query($koneksi, "SHOW COLUMNS FROM `$tabel_supplier`");
		if ($cek2) { while ($c = mysqli_fetch_assoc($cek2)) { $kolom_supplier_fields[] = $c['Field']; } }
		$kolom_id_supplier_kandidat = ['id','id_supplier'];
		$kolom_nama_supplier_kandidat = ['nama','name','nama_supplier','supplier_name'];
		$kolom_id_supplier = null; $kolom_nama_supplier = null;
		foreach ($kolom_id_supplier_kandidat as $k) { if (in_array($k, $kolom_supplier_fields, true)) { $kolom_id_supplier = $k; break; } }
		foreach ($kolom_nama_supplier_kandidat as $k) { if (in_array($k, $kolom_supplier_fields, true)) { $kolom_nama_supplier = $k; break; } }
		if ($kolom_id_supplier && $kolom_nama_supplier) {
			$sql_all_sup = "SELECT `$kolom_id_supplier`, `$kolom_nama_supplier` FROM `$tabel_supplier` ORDER BY `$kolom_nama_supplier`";
			$res_all_sup = @mysqli_query($koneksi, $sql_all_sup);
			if ($res_all_sup) {
				while ($rs = mysqli_fetch_assoc($res_all_sup)) {
					$id_sup = (int)$rs[$kolom_id_supplier];
					$nama_sup = (string)$rs[$kolom_nama_supplier];
					$daftar_supplier_semua[] = ['id'=>$id_sup,'nama'=>$nama_sup];
				}
			}
			foreach ($daftar_supplier_semua as $sp) { $peta_supplier[$sp['id']] = $sp['nama']; }
		}
	}
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="p-4">
<?php include '../../layouts/header.php'; ?>

<div class="container-fluid mt-3">
	<div class="d-flex align-items-center justify-content-between mb-3">
		<h5 class="mb-0">Master Barang</h5>
		<span class="badge bg-primary">Total: <?php echo count($data_baris); ?></span>
	</div>

	<?php if ($tabel_barang && $daftar_kolom): ?>
	<div class="card mb-3">
		<div class="card-header d-flex justify-content-between align-items-center">
			<span>Tambah Barang</span>
			<button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#formTambah">Tampilkan/Sembunyikan</button>
		</div>
		<div class="card-body collapse" id="formTambah">
			<form method="post">
				<input type="hidden" name="aksi" value="tambah">
				<div class="row g-2">
					<?php foreach ($daftar_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
					<div class="col-md-3">
						<label class="form-label small"><?php
							$label = ucwords(str_replace('_',' ', $kol));
							if (in_array(strtolower($kol), ['id_supplier','supplier_id'], true)) { $label = 'Supplier'; }
							echo htmlspecialchars($label);
						?></label>
						<?php if ($kolom_supplier_id && strtolower($kol) === strtolower($kolom_supplier_id) && $daftar_supplier_semua): ?>
						<select name="<?php echo htmlspecialchars($kol); ?>" class="form-select form-select-sm">
							<option value="">-- Pilih Supplier --</option>
							<?php foreach ($daftar_supplier_semua as $sup): ?>
							<option value="<?php echo (int)$sup['id']; ?>"><?php echo htmlspecialchars($sup['nama']); ?></option>
							<?php endforeach; ?>
						</select>
						<?php else: ?>
						<input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" placeholder="Isi <?php echo htmlspecialchars($label); ?>">
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

	<?php if (!$tabel_barang): ?>
		<div class="alert alert-warning">Tabel barang tidak ditemukan. Coba salah satu nama: <code>barang</code>, <code>tb_barang</code>, <code>items</code>, <code>product</code>, <code>products</code>.</div>
	<?php elseif (!$data_baris): ?>
		<div class="alert alert-info">Belum ada data barang.</div>
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
									<?php if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
									<?php
										$label = ucwords(str_replace('_', ' ', $kol));
										if (in_array(strtolower($kol), ['id_supplier','supplier_id'], true)) {
											$label = 'Supplier';
										}
									?>
									<th><?php echo htmlspecialchars($label); ?></th>
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
						?>
						<?php if ($baris_edit && $kolom_id): ?>
						<tr class="table-warning">
							<td colspan="100%">
								<form method="post">
									<input type="hidden" name="aksi" value="ubah">
									<input type="hidden" name="<?php echo htmlspecialchars($kolom_id); ?>" value="<?php echo htmlspecialchars($baris_edit[$kolom_id]); ?>">
									<div class="row g-2">
										<?php foreach ($daftar_kolom as $kol): if (strtolower($kol) === strtolower($kolom_id)) { continue; } ?>
										<div class="col-md-3">
											<label class="form-label small"><?php
												$label = ucwords(str_replace('_',' ', $kol));
												if (in_array(strtolower($kol), ['id_supplier','supplier_id'], true)) { $label = 'Supplier'; }
												echo htmlspecialchars($label);
											?></label>
											<?php if ($kolom_supplier_id && strtolower($kol) === strtolower($kolom_supplier_id) && $daftar_supplier_semua): ?>
											<select name="<?php echo htmlspecialchars($kol); ?>" class="form-select form-select-sm">
												<option value="">-- Pilih Supplier --</option>
												<?php $nilai_sup_edit = (int)($baris_edit[$kol] ?? 0); foreach ($daftar_supplier_semua as $sup): ?>
												<option value="<?php echo (int)$sup['id']; ?>" <?php echo ($sup['id']===$nilai_sup_edit)?'selected':''; ?>><?php echo htmlspecialchars($sup['nama']); ?></option>
												<?php endforeach; ?>
											</select>
											<?php else: ?>
											<input type="text" class="form-control form-control-sm" name="<?php echo htmlspecialchars($kol); ?>" value="<?php echo htmlspecialchars((string)($baris_edit[$kol] ?? '')); ?>">
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
								<?php foreach ($daftar_kolom as $kol): if ($kolom_id && strtolower($kol) === strtolower($kolom_id)) { continue; } $nilai = $baris[$kol] ?? ''; ?>
									<td>
										<?php
											if ($kolom_supplier_id && strtolower($kol) === strtolower($kolom_supplier_id)) {
												$idsup = (int)$nilai;
												$nama_sup = isset($peta_supplier[$idsup]) ? $peta_supplier[$idsup] : (string)$nilai;
												echo htmlspecialchars($nama_sup);
											} elseif (in_array(strtolower($kol), $daftar_kolom_uang, true)) {
												echo 'Rp. '.number_format((int)$nilai, 0, ',', '.');
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
