<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>10 - Biodata Tabel</title>
  <style>
    body{font-family:system-ui,Arial;padding:24px;background:#fafafa}
    table{border-collapse:collapse;width:520px;max-width:100%;background:white;border:1px solid #ddd}
    th,td{padding:10px 12px;border-bottom:1px solid #eee;text-align:left}
    thead th{background:#f3f4f6}
    tbody tr:last-child td{border-bottom:none}
  </style>
</head>
<body>
<?php
  // 10_biodata_table.php — Data biodata disimpan di variabel PHP
  $biodata = [
    "Nama Lengkap" => "Zainur Rozikin",
    "NIM"          => "240411100120",
    "Kelas"        => "PAW 3B",
    "Program Studi"=> "Teknik Informatika",
    "Alamat"       => "Bojonegoro, jawa timur",
    "Hobi"         => "Desain, Coding, Musik"
  ];
?>
  <h1>Biodata Mahasiswa</h1>
  <table>
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
