<?php
require __DIR__.'/koneksi.php';
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
if(($_SERVER['REQUEST_METHOD']??'')!=='POST'){header('Location: nota_input.php');exit;}

$id_pengguna=(int)($_SESSION['user_id']??($_POST['user_id']??1));
$nomor_nota=trim($_POST['nomor']??'');
$tanggal=$_POST['tgl']??date('Y-m-d');
$status_nota=$_POST['status']??'DRAFT';
$id_pelanggan=trim($_POST['pelanggan_id']??'');
$daftar_id_barang=$_POST['barang_id']??[];
$daftar_qty=$_POST['qty']??[];

// Kumpulkan item valid (id & qty > 0)
$item_nota=[];
for($i=0,$n=count($daftar_id_barang);$i<$n;$i++){
  $id_barang=(int)$daftar_id_barang[$i]; $qty=(int)($daftar_qty[$i]??0);
  if($id_barang>0 && $qty>0) $item_nota[]=['id'=>$id_barang,'qty'=>$qty];
}
if(!$id_pelanggan || !$nomor_nota || !$item_nota){
  flash('err','Data kurang.'); header('Location: nota_input.php'); exit;
}

// Ambil harga barang sekaligus hitung subtotal & total nominal
$ids=array_column($item_nota,'id');
$id_list=implode(',',array_unique($ids));
$map_harga=[];
if($id_list){
  $q=mysqli_query($conn,"SELECT id,harga FROM barang WHERE id IN ($id_list)");
  while($r=mysqli_fetch_assoc($q)) $map_harga[(int)$r['id']]=(int)$r['harga'];
  mysqli_free_result($q);
}
$total_nominal=0;
foreach($item_nota as &$it){
  $h=$map_harga[$it['id']]??0;
  $it['harga']=$h;
  $it['subtotal']=$h*$it['qty'];
  $total_nominal+=$it['subtotal'];
}
unset($it); // break reference

try{
  // Mulai transaksi untuk konsistensi antara header dan detail
  mysqli_begin_transaction($conn);

  // Simpan header nota
  $stmt=mysqli_prepare($conn,"INSERT INTO nota_jual(nomor,tgl,pelanggan_id,user_id,total,status)VALUES(?,?,?,?,?,?)");
  mysqli_stmt_bind_param($stmt,'sssiss',$nomor_nota,$tanggal,$id_pelanggan,$id_pengguna,$total_nominal,$status_nota);
  mysqli_stmt_execute($stmt);
  $id_nota=mysqli_insert_id($conn);
  mysqli_stmt_close($stmt);

  // Simpan detail (qty saja; harga bisa dilihat dari tabel barang saat tampil)
  $stmt=mysqli_prepare($conn,"INSERT INTO nota_item(nota_id,barang_id,qty)VALUES(?,?,?)");
  foreach($item_nota as $row){
    mysqli_stmt_bind_param($stmt,'iii',$id_nota,$row['id'],$row['qty']);
    mysqli_stmt_execute($stmt);
  }
  mysqli_stmt_close($stmt);

  mysqli_commit($conn);
  flash('ok','Nota tersimpan: '.htmlspecialchars($nomor_nota,ENT_QUOTES));
  header('Location: nota_detail.php?id='.$id_nota); exit;
} catch(Throwable $e){
  mysqli_rollback($conn);
  flash('err','Gagal: '.$e->getMessage());
  header('Location: nota_input.php'); exit;
}