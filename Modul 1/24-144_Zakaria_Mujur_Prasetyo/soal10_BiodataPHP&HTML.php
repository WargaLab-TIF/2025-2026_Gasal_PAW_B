<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>10 - Biodata Tabel</title>
  <style>
    body {
      font-family: Poppins, Arial;
      padding: 24px;
      background: #fafafa;
      user-select: none;
    }
    h1 {
      text-align: center
    }

    table {
      border-collapse: collapse;
      width: 520px;
      max-width: 100%;
      background: white;
      margin: 0 auto;
    }

    thead th {
      background: #0055ff7b;
    }
  </style>
</head>
<body>
<?php
  $biodata = [
    "Nama Lengkap" => "Zakaria Mujur Prasetyo",
    "NIM"          => "240411100144",
    "Kelas"        => "PAW 3B",
    "Program Studi"=> "Teknik Informatika",
    "Alamat"       => "Gresik",
    "Hobi"         => "Desain, Coding, Musik"
  ];

?>
  <h1>Biodata Mahasiswa</h1>
  <table border="1" cellpadding="10" cellspacing="0">
    <thead>
      <tr>
        <th>Field</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($biodata as $field => $value): ?>
      <tr>
        <td><?php echo htmlspecialchars($field); ?></td>
        <td><?php echo htmlspecialchars($value); ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
