<!DOCTYPE html>
<html lang="en">
<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "", "reporting");

$start = $_GET['start'] ?? "";
$end = $_GET['end'] ?? "";
$message = "";
if ($start && $end) {
    $sql = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$start' AND '$end'";
    $message = "Dari $start Hingga $end";
} else {
    $sql = "SELECT * FROM transaksi";
}



$datas = mysqli_query($conn, $sql);
$data = [];
$tanggal = [];
$total = [];
$pelangan = 0;
$pendapatan = 0;


while ($d = mysqli_fetch_assoc($datas)) {
    $data[] = $d;
    $tanggal[] = $d['tanggal'];
    $total[] = $d['total'];
    $pelangan += 1;
    $pendapatan += $d['total'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        form {
            position: fixed;
            width: 102%;
            margin: 0;
            padding: 10px 10px 0 10px;
            backdrop-filter: blur(3px);
            box-shadow: 0 0 10px gray;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .gap {
            height: 100px;
        }

        .chart {
            height: 50%;
            margin: 20px;
        }

        .containered {
            display: flex;
            gap: 10px;
            padding: 0 10px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <form class="row g-3 no-print">
        <div class="col-auto">
            <input type="date" class="form-control" name="start" value="<?= $_GET['start'] ?? "" ?>">
        </div>
        <div class="col-auto">
            <input type="date" class="form-control" name="end" value="<?= $_GET['end'] ?? "" ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success mb-3">Tampilkan</button>
        </div>
        <div class="col-auto right">
            <button type="button" onclick="window.print()" class="no-print btn btn-danger"><i class="fa-solid fa-print"></i> Print</button>
            <a href="./print.php?start=<?= $start ?>&end=<?= $end ?>" type="button" class="no-print btn btn-danger"><i class="fa-solid fa-file-excel"></i>Excel</a>
        </div>

    </form>
    <div class="gap"></div>
    <div class="containered">

    </div>
    <h1 align="center">Rekab Data Penjualan <?= $message ?></h1>
    <div class="chart">
        <canvas id="myChart"></canvas>
    </div>

    <table class="table table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>
        <?php foreach ($data as $dt) { ?>
            <tr>
                <td><?= $dt['id'] ?></td>
                <td>Rp. <?= $dt['total'] ?></td>
                <td><?= $dt['tanggal'] ?></td>
            </tr>
        <?php } ?>
    </table>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Jumlah Pelanggan</th>
                <th scope="col">Jumlah Pendapatan</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td><?= $pelangan ?></td>
                <td>Rp<?= $pendapatan ?></td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($tanggal) ?>,
                datasets: [{
                    label: '# of Votes',
                    data: <?= json_encode($total) ?>,
                    borderWidth: 1
                }]
            },
            options: {

                plugin: {
                    colors: {
                        forceOverride: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>