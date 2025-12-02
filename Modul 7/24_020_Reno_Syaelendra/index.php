<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "asistensi_modul7");

// Query rata-rata pendapatan per tanggal
$query = "SELECT tanggal, AVG(pendapatan) AS rata_rata
          FROM asistensi_modul7
          GROUP BY tanggal
          ORDER BY tanggal ASC";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul 7 - Rata-Rata Pendapatan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Tabel Rata-Rata Pendapatan</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Rata-Rata Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
                <tr>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= number_format($row['rata_rata'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Chart Pendapatan</h2>
    <canvas id="myChart" width="600" height="300"></canvas>
    <br>
    <button id="resetBtn">Reset</button>

    <script>
        // Data awal dari PHP
        const tanggalArray = <?= json_encode(array_column($data, 'tanggal')); ?>;
        const pendapatanArray = <?= json_encode(array_column($data, 'rata_rata')); ?>;

        const ctx = document.getElementById('myChart').getContext('2d');
        let chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: tanggalArray,
                datasets: [{
                    label: 'Rata-Rata Pendapatan',
                    data: pendapatanArray,
                    borderColor: 'blue',
                    fill: false
                }]
            }
        });

        // Tombol Reset
        document.getElementById('resetBtn').addEventListener('click', function() {
            fetch('getData.php?start=2025-11-01&end=<?= date("Y-m-d"); ?>')
                .then(response => response.json())
                .then(data => {
                    chart.data.labels = data.tanggal;
                    chart.data.datasets[0].data = data.pendapatan;
                    chart.update();
                });
        });
    </script>
</body>
</html>
