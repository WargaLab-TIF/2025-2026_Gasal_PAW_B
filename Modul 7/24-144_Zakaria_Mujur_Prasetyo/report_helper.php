<?php
// Fungsi dasar validasi format tanggal sederhana (YYYY-MM-DD)
function validasiTanggal(string $nilai): bool
{
    $objek = DateTime::createFromFormat('Y-m-d', $nilai);
    return $objek !== false && $objek->format('Y-m-d') === $nilai;
}

// Menormalkan rentang tanggal: fallback ke default & tukar jika awal > akhir
function normalisasiRentangTanggal(array $sumber, string $kunciAwal, string $kunciAkhir, string $awalDefault, string $akhirDefault): array
{
    $awal = $sumber[$kunciAwal] ?? $awalDefault;
    $akhir = $sumber[$kunciAkhir] ?? $akhirDefault;

    if (!validasiTanggal($awal)) {
        $awal = $awalDefault;
    }
    if (!validasiTanggal($akhir)) {
        $akhir = $akhirDefault;
    }
    if ($awal > $akhir) {
        [$awal, $akhir] = [$akhir, $awal];
    }
    return [$awal, $akhir];
}

// Ambil total harian dari nota_jual (status LUNAS)
function ambilTotalHarianNota(mysqli $koneksi, string $awal, string $akhir): array
{
    $baris = [];
    $error = null;
    $awalEsc = mysqli_real_escape_string($koneksi, $awal);
    $akhirEsc = mysqli_real_escape_string($koneksi, $akhir);

    $sql = "SELECT DATE(tgl) AS tanggal, SUM(total) AS total_harian FROM nota_jual "
         . "WHERE status = 'LUNAS' AND DATE(tgl) BETWEEN '$awalEsc' AND '$akhirEsc' "
         . "GROUP BY DATE(tgl) ORDER BY DATE(tgl)";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil === false) {
        $error = mysqli_error($koneksi);
    } else {
        while ($r = mysqli_fetch_assoc($hasil)) {
            $baris[] = [
                'tanggal' => $r['tanggal'],
                'total_harian' => isset($r['total_harian']) ? (float)$r['total_harian'] : 0.0,
            ];
        }
        mysqli_free_result($hasil);
    }
    return ['data' => $baris, 'error' => $error];
}

// Ambil total harian dari tabel transaksi (tanpa status)
function ambilTotalHarianTransaksi(mysqli $koneksi, string $awal, string $akhir): array
{
    $baris = [];
    $error = null;
    $awalEsc = mysqli_real_escape_string($koneksi, $awal);
    $akhirEsc = mysqli_real_escape_string($koneksi, $akhir);

    $sql = "SELECT DATE(waktu_transaksi) AS tanggal, SUM(total) AS total_harian FROM transaksi "
         . "WHERE DATE(waktu_transaksi) BETWEEN '$awalEsc' AND '$akhirEsc' "
         . "GROUP BY DATE(waktu_transaksi) ORDER BY DATE(waktu_transaksi)";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil === false) {
        $error = mysqli_error($koneksi);
    } else {
        while ($r = mysqli_fetch_assoc($hasil)) {
            $baris[] = [
                'tanggal' => $r['tanggal'],
                'total_harian' => isset($r['total_harian']) ? (float)$r['total_harian'] : 0.0,
            ];
        }
        mysqli_free_result($hasil);
    }
    return ['data' => $baris, 'error' => $error];
}

// Ringkasan nota (pelanggan unik + pendapatan total)
function ambilRingkasanNota(mysqli $koneksi, string $awal, string $akhir): array
{
    $data = ['total_pelanggan' => 0, 'total_pendapatan' => 0.0];
    $error = null;
    $awalEsc = mysqli_real_escape_string($koneksi, $awal);
    $akhirEsc = mysqli_real_escape_string($koneksi, $akhir);

    $sql = "SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan, SUM(total) AS total_pendapatan FROM nota_jual "
         . "WHERE status = 'LUNAS' AND DATE(tgl) BETWEEN '$awalEsc' AND '$akhirEsc'";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil === false) {
        $error = mysqli_error($koneksi);
    } else {
        $r = mysqli_fetch_assoc($hasil);
        if ($r) {
            $data['total_pelanggan'] = isset($r['total_pelanggan']) ? (int)$r['total_pelanggan'] : 0;
            $data['total_pendapatan'] = isset($r['total_pendapatan']) ? (float)$r['total_pendapatan'] : 0.0;
        }
        mysqli_free_result($hasil);
    }
    return ['data' => $data, 'error' => $error];
}

// Ringkasan transaksi
function ambilRingkasanTransaksi(mysqli $koneksi, string $awal, string $akhir): array
{
    $data = ['total_pelanggan' => 0, 'total_pendapatan' => 0.0];
    $error = null;
    $awalEsc = mysqli_real_escape_string($koneksi, $awal);
    $akhirEsc = mysqli_real_escape_string($koneksi, $akhir);

    $sql = "SELECT COUNT(DISTINCT pelanggan_id) AS total_pelanggan, SUM(total) AS total_pendapatan FROM transaksi "
         . "WHERE DATE(waktu_transaksi) BETWEEN '$awalEsc' AND '$akhirEsc'";

    $hasil = mysqli_query($koneksi, $sql);
    if ($hasil === false) {
        $error = mysqli_error($koneksi);
    } else {
        $r = mysqli_fetch_assoc($hasil);
        if ($r) {
            $data['total_pelanggan'] = isset($r['total_pelanggan']) ? (int)$r['total_pelanggan'] : 0;
            $data['total_pendapatan'] = isset($r['total_pendapatan']) ? (float)$r['total_pendapatan'] : 0.0;
        }
        mysqli_free_result($hasil);
    }
    return ['data' => $data, 'error' => $error];
}

// Format angka ke Rupiah
function formatRupiah(float $nilai): string
{
    return 'Rp ' . number_format($nilai, 0, ',', '.');
}

// Format tanggal ke tampilan lokal
function formatTanggal(string $nilai): string
{
    $timestamp = strtotime($nilai);
    return $timestamp ? date('d M Y', $timestamp) : $nilai;
}

// Gabungan periode (awal sampai akhir)
function formatPeriode(string $awal, string $akhir): string
{
    return formatTanggal($awal) . ' sampai ' . formatTanggal($akhir);
}

// Backward compatibility: fungsi lama diarahkan ke nama baru
function normalizeDateRange(array $s, string $sa, string $se, string $dsa, string $dse): array { return normalisasiRentangTanggal($s,$sa,$se,$dsa,$dse); }
function fetchDailyTotalsTransaksi(mysqli $c, string $a, string $b): array { return ambilTotalHarianTransaksi($c,$a,$b); }
function fetchSummaryTransaksi(mysqli $c, string $a, string $b): array { return ambilRingkasanTransaksi($c,$a,$b); }

