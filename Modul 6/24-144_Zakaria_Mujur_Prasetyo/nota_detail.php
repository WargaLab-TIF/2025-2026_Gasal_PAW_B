<?php
require __DIR__.'/koneksi.php';

$id_nota=(int)($_GET['id']??0); if($id_nota<=0){echo "ID nota tidak valid."; exit;}
$r=mysqli_query($conn,"SELECT id,nomor,tgl,pelanggan_id,user_id,total,status FROM nota_jual WHERE id=$id_nota");
$nota_header=mysqli_fetch_assoc($r); mysqli_free_result($r); if(!$nota_header){echo "Nota tidak ditemukan."; exit;}

$data_item=[]; 
if($r=mysqli_query($conn,"SELECT barang_id,qty FROM nota_item WHERE nota_id=$id_nota")){
  while($x=mysqli_fetch_assoc($r)) $data_item[]=$x; mysqli_free_result($r);
}

$nama_pelanggan=$nota_header['pelanggan_id']; 
$id_pelanggan_escape=mysqli_real_escape_string($conn,$nota_header['pelanggan_id']);
if($p=mysqli_query($conn,"SELECT nama FROM pelanggan WHERE id='$id_pelanggan_escape'")){
  if($row=mysqli_fetch_assoc($p)) $nama_pelanggan=$row['nama']; mysqli_free_result($p);
}

$peta_barang=[];
if($data_item){
  $id_set=implode(',',array_unique(array_map(fn($x)=>(int)$x['barang_id'],$data_item)));
  if($id_set){
    if($r=mysqli_query($conn,"SELECT id,nama_barang FROM barang WHERE id IN ($id_set)")){
      while($b=mysqli_fetch_assoc($r)) $peta_barang[(int)$b['id']]=$b['nama_barang'];
      mysqli_free_result($r);
    }
  }
}
?>
<!doctype html><html lang="id"><head>
<meta charset="utf-8"><title>Detail Nota</title>
<link rel="stylesheet" href="assets/style.css">
</head><body>
<main class="wadah jarak">
  <h3 class="judul-biru">Detail Nota</h3>
  <div class="kartu bayangan"><div class="isi">
    <p class="bawah3">
      <b>Nomor:</b> <?=htmlspecialchars($nota_header['nomor'])?> |
      <b>Tanggal:</b> <?=htmlspecialchars($nota_header['tgl'])?> |
      <b>Pelanggan:</b> <?=htmlspecialchars($nama_pelanggan)?> (<?=htmlspecialchars($nota_header['pelanggan_id'])?>) |
      <b>User ID:</b> <?=htmlspecialchars($nota_header['user_id'])?> |
      <b>Status:</b> <?=htmlspecialchars($nota_header['status'])?> |
      <b>Total:</b> Rp <?=number_format((int)$nota_header['total'],0,',','.')?>
    </p>
    <div class="tabelres">
      <table class="tabel tengahvert">
        <thead><tr><th>No</th><th>Barang</th><th>Qty</th></tr></thead>
        <tbody>
          <?php $nomor_urut=1; foreach($data_item as $it): 
            $qty=(int)$it['qty']; $nama_barang=$peta_barang[(int)$it['barang_id']]??$it['barang_id']; ?>
            <tr>
              <td class="tengah"><?=$nomor_urut++?></td>
              <td><?=htmlspecialchars($nama_barang)?></td>
              <td class="tengah"><?=htmlspecialchars($qty)?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <p class="bawah0"><a class="tombol sukses kecil" href="nota_input.php">Input Nota Baru</a></p>
  </div></div>
</main>
</body></html>