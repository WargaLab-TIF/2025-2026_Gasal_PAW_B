<html>
<head>
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Kasir Sederhana</h2>


    <form method="post">
        <label>Pilih Menu:</label><br>
        <select name="menu">
            <option value="Nasi Goreng-15000">Nasi Goreng - Rp 15.000</option>
            <option value="Mie Ayam-12000">Mie Ayam - Rp 12.000</option>
            <option value="Es Teh-5000">Es Teh - Rp 5.000</option>
            <option value="Kopi-7000">Kopi - Rp 7.000</option>
        </select>
        <br><br>


        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required>
        <br><br>


        <input type="submit" name="pesan" value="Hitung Total">
    </form>


    <?php
    if (isset($_POST['pesan'])) {
        list($nama, $harga) = explode("-", $_POST['menu']);
        $jumlah = $_POST['jumlah'];


        $subtotal = $harga * $jumlah;


        echo "<h3>Rincian Pesanan:</h3>";
        echo "Menu: $nama <br>";
        echo "Harga: Rp $harga <br>";
        echo "Jumlah: $jumlah <br>";
        echo "Total Bayar: <b>Rp $subtotal</b><br>";
    }
    ?>
</body>
</html>
