<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>02 - PHP + HTML</title>
  <style>body{font-family:system-ui,Arial;padding:20px} code{background:#f3f3f3;padding:2px 6px;border-radius:6px}</style>
</head>
<body>
  <h1>Contoh Menggabungkan PHP dan HTML</h1>
  <p>Waktu sekarang: <strong><?php echo date('Y-m-d H:i:s'); ?></strong></p>
  <?php
    $pesan = "Halo dari PHP di dalam HTML!";
    echo "<p>$pesan</p>";
  ?>
  <p>Tag HTML tetap bisa digunakan bersama <code>&lt;?php ?&gt;</code>.</p>
</body>
</html>
