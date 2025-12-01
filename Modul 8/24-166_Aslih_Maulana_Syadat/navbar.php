<?php if (session_status() == PHP_SESSION_NONE) {
  session_start();
} ?>
<div class="navbar">
  <div style="display:flex; align-items:center;">
    <div class="brand">SISTEM PENJUALAN</div>
    <a href="index.php">Home</a>

    <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
      <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">Data Master ▼</button>
        <div id="masterDropdown" class="dropdown-content">
          <a href="master_barang.php">Master Barang</a>
          <a href="master_pelanggan.php">Master Pelanggan</a>
          <a href="master_supplier.php">Master Supplier</a>
          <a href="master_user.php">Master User</a>
        </div>
      </div>
    <?php } ?>

    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>
  </div>

  <div style="display:flex; align-items:center;">
    <span style="color:white; margin-right:20px;">Halo, <b><?php echo $_SESSION['nama']; ?></b></span>
    <a href="logout.php" style="background-color: crimson;">Logout</a>
  </div>
</div>

<script>
  /* Logika Dropdown Klik */
  function toggleDropdown() {
    document.getElementById("masterDropdown").classList.toggle("show");
  }

  // Menutup dropdown jika user klik di luar area
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>