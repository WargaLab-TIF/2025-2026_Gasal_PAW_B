// Script tampilan laporan (grafik & unduh excel) versi Bahasa Indonesia
(function () {
  // Gambar grafik batang total transaksi per hari
  function gambarGrafikTransaksi(label, nilai, idKanvas) {
    const kanvas = document.getElementById(idKanvas);
    if (!kanvas || !Array.isArray(label) || label.length === 0) return; // Tidak ada data
    // eslint-disable-next-line no-undef
    new Chart(kanvas, {
      type: 'bar',
      data: {
        labels: label,
        datasets: [
          {
            label: 'Total Transaksi',
            data: nilai || [],
            borderWidth: 1,
            backgroundColor: 'rgba(59, 130, 246, 0.7)',
            borderColor: 'rgba(37, 99, 235, 1)'
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: (v) => new Intl.NumberFormat('id-ID').format(v)
            }
          }
        }
      }
    });
  }

  // Aksi unduh excel dengan parameter tanggal
  function unduhExcel() {
    const awalEl = document.getElementById('start_date');
    const akhirEl = document.getElementById('end_date');
    if (!awalEl || !akhirEl) return;
    const params = new URLSearchParams({ start_date: awalEl.value, end_date: akhirEl.value });
    window.location.href = 'excel.php?' + params.toString();
  }

  // Ekspor fungsi untuk dipakai tombol di HTML
  window.unduhExcel = unduhExcel;

  document.addEventListener('DOMContentLoaded', function () {
    if (typeof labelGrafik !== 'undefined' && typeof nilaiGrafik !== 'undefined') {
      gambarGrafikTransaksi(labelGrafik, nilaiGrafik, 'salesChart');
    }
  });
})();
