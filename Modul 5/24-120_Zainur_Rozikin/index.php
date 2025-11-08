<?php 
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "store"; 
$con = mysqli_connect($localhost, $username, $password, $dbname);  
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Data Master Supplier</title> 
<style>
body {
    font-family: Arial, sans-serif;
    background-color: whitesmoke;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    margin: 30px auto;
}

h2 {
    color: dodgerblue;
    font-size: 24px;
    margin-bottom: 15px;
    font-weight: bold;
}

.btn-add, .btn-edit, .btn-delete {
    border: none;
    padding: 7px 14px;
    cursor: pointer;
    color: white;
    border-radius: 4px;
    font-size: 14px;
}

.btn-add {
    background-color: green;
}
.btn-add:hover {
    background-color: darkgreen;
}

.btn-edit {
    background-color: orange;
}
.btn-edit:hover {
    background-color: darkorange;
}

.btn-delete {
    background-color: crimson;
}
.btn-delete:hover {
    background-color: firebrick;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

thead tr {
    background-color: lightsteelblue;
    border-bottom: 2px solid lightblue;
}

thead th {
    padding: 10px;
    font-weight: bold;
    text-align: center;
}

tbody td {
    padding: 10px;
    border: 1px solid silver;
    text-align: center;
}

tbody tr:hover {
    background-color: aliceblue;
}

.tambah {
    text-align: right;
    margin-bottom: 10px;
}

</style>
</head>

<body> 
<div class="container"> 
    <h2>Data Master Supplier</h2> 

    <div class="tambah"> 
        <a href="tambahData.php"><button class="btn-add">Tambah Data</button></a> 
    </div> 

    <table border="1" class="head"> 
        <thead> 
            <tr> 
                <th>No</th> 
                <th>Nama</th> 
                <th>Telp</th> 
                <th>Alamat</th> 
                <th>Tindakan</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php 
            $query = "SELECT * FROM supplier"; 
            $queryRun = mysqli_query($con, $query); 

            if (mysqli_num_rows($queryRun) > 0) { 
                $no = 1; 
                while ($row = mysqli_fetch_array($queryRun)) { 
                    echo "<tr>"; 
                    echo "<td>" . $no++ . "</td>"; 
                    echo "<td>" . $row['nama'] . "</td>"; 
                    echo "<td>" . $row['telp'] . "</td>"; 
                    echo "<td>" . $row['alamat'] . "</td>"; 
                    echo "<td>"; 
                    echo "<a href='edit.php?id=" . $row['id'] . "'><button class='btn-edit'>Edit</button></a> "; 
                    echo "<a href='hapus.php?hapus=" . $row['id'] . "' onclick=\"return confirm('Anda yakin akan menghapus supplier ini?')\"><button class='btn-delete'>Hapus</button></a>";
                    echo "</td>"; 
                    echo "</tr>"; 
                } 
            } else { 
                echo "<tr><td colspan='5'>No records found</td></tr>"; 
            } 
            ?> 
        </tbody> 
    </table> 
</div> 
</body> 
</html>