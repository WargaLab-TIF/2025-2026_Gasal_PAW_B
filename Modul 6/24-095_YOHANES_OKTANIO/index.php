<?php
require_once "koneksi.php";
$barang = mysqli_query($conn, "SELECT * FROM barang");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1></h1>
    <form action="transaksi.php" method="post">
        <label for="keterangan">Keterangan</label><br>
        <textarea name="keterangan"> </textarea><br>
        <select id="option">
            <?php
            while ($row = mysqli_fetch_array($barang)) {
                echo "<option value='" . $row['stok'] . ":" . $row['nama_barang'] . ":" . $row['harga'] . ":" . $row['id'] . "'>" . "[ stock : " . $row['stok'] . " ] | " . $row['nama_barang'] . " Rp" . $row['harga'] . " </option>";
            }
            ?>
        </select>
        <input type="number" id="jumlah" placeholder="jumlah">
        <button type="button" onclick="addBarang()">Tambah</button>
        <button type="submit">Kirim</button>
        
        <br>    
        <br>
        <table border="1" cellpadding="10">
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </table>
        <div id="hidden-input">

        </div>
    </form>


    <script>
        function addBarang() {
            if (jumlah.value > 0 && jumlah) {

                const option = document.getElementById('option');
                const jumlah = document.getElementById('jumlah');
                const table = document.querySelector('table');
                const tr = document.createElement('tr')

                const td = [
                    document.createElement('td'),
                    document.createElement('td'),
                    document.createElement('td'),
                    document.createElement('td'),
                ]

                const inputHiddenIdBarang = document.createElement('input');
                inputHiddenIdBarang.setAttribute('type','hidden');
                inputHiddenIdBarang.value = parseInt(option.value.split(":")[3]);
                inputHiddenIdBarang.setAttribute('name','idbarang[]');
                const inputHiddenJumlahBarang = document.createElement('input');
                inputHiddenJumlahBarang.setAttribute('type','hidden');
                inputHiddenJumlahBarang.setAttribute('name','jumlahbarang[]');
                inputHiddenJumlahBarang.value = parseInt(jumlah.value)
                
                document.getElementById('hidden-input').appendChild(inputHiddenIdBarang);
                document.getElementById('hidden-input').appendChild(inputHiddenJumlahBarang);


                td[0].innerHTML = option.value.split(':')[1]
                td[1].innerHTML = jumlah.value
                td[2].innerHTML = option.value.split(':')[2]
                td[3].innerHTML = parseInt(td[1].innerHTML) * parseInt(td[2].innerHTML)
                td.forEach(e => {
                    tr.appendChild(e)
                })

                table.appendChild(tr)
            }
        }
    </script>
</body>

</html>