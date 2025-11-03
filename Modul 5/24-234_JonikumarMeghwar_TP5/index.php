<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paw_mod5</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .heading {
            background-color: skyblue;
            padding: 25px;
            margin-bottom: 30px;
        }

        .heading h3 {
            color: #fff;
            display: inline-block;
        }

        .heading a {
            float: right;
            background-color: green;
            padding: 8px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .heading a:hover {
            background-color: darkblue;
        }

        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

   
 
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: skyblue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
        }

        .btn-update {
            background-color: orange;
        }

        .btn-delete {
            background-color: red;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
        }

        .green { color: green; }
        .blue { color: blue; }
        .red { color: red; }
    </style>
</head>

<body>

<div class="heading">
<h3>Todo List</h3>
<a href="add.php">Data Supplier</a>
</div>

<div class="container">
<table>
<thead>
    <tr>
        <th>NO.</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telp</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    <?php 
    
    $query = "SELECT * FROM 4infodata";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
  <tr>
    <td><?php echo htmlspecialchars($row['id']); ?></td>
    <td><?php echo htmlspecialchars($row['nama']); ?></td>
    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
    <td><?php echo htmlspecialchars($row['telp']); ?></td>
    <td>
        <a class="btn btn-update" href="update.php?id=<?php echo $row['id']; ?>">Update</a>
    </td>
    <td> <a class="btn btn-delete" href="javascript:void(0);" 
        onclick="if (confirm('Are you sure you want to delete this book?')) { window.location.href='delete.php?id=<?php echo $row['id']; ?>'; }">
        Delete
    </a></td>
        </tr>
    <?php 
            }
        } else {
            echo "<tr><td colspan='6' style='color:red;'>No records found</td></tr>";
        }
    }
    ?>
</tbody>
</table>

<?php 
$add = $_GET["add"] ?? null; 
$updated = $_GET["updated"] ?? null; 
$del = $_GET["del"] ?? null;

if ($add) {
echo "<p class='message green'>✅ Record added successfully!</p>";
}

if ($updated) {
echo "<p class='message blue'>ℹ️ Record updated successfully!</p>";
}

if ($del) {
echo "<p class='message red'>❌ Record deleted successfully!</p>";
}
?>
</div>
</body>
</html>
 