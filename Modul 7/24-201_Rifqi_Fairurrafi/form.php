<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        form {
            padding: 10px;
            background-color: lightgrey;
            border-radius: 5px;
            border: 1px solid grey;
        }

        button {
            background: linear-gradient(to bottom, #7ed957, #5fae3c);
            color: white;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: linear-gradient(to bottom, #75cd50, #559b35)
        }

        input {
            border-radius: 5px;
            border: 1px solid grey;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="laporan.php" method="get">
        <input type="date" name="tanggal_awal" value="<?= $tanggal_awal ?>">
        <input type="date" name="tanggal_akhir"value="<?= $tanggal_awal ?>">
        <button type="submit">Tampilkan</button>
    </form>
</body>
</html>