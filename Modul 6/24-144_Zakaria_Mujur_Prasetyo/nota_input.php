  <?php
  require __DIR__.'/koneksi.php';

  $id_pengguna=(int)($_SESSION['user_id']??1);
  $teks_pengguna='User ID: '.$id_pengguna;

  /**
   * buat_nomor_nota
   * Membuat nomor nota unik per tahun dengan format: NJ-YYYY-XXX
   * Mengambil MAX(nomor) yang sesuai prefix tahun berjalan lalu menambah urutan.
   */
  function buat_nomor_nota(mysqli $k): string{
    $p='NJ-'.date('Y').'-'; $m='';
    if($r=mysqli_query($k,"SELECT MAX(nomor) m FROM nota_jual WHERE nomor LIKE '{$p}%'")){
      $row=mysqli_fetch_assoc($r); $m=$row['m']??''; mysqli_free_result($r);
    }
    $u=$m?(int)substr($m,-3):0;
    return $p.str_pad($u+1,3,'0',STR_PAD_LEFT);
  }
  $nomor_nota=buat_nomor_nota($conn);
  $tanggal=date('Y-m-d');

  // Build opsi pelanggan
  $opsi_pelanggan='<option value="">-- Pilih --</option>';
  if($r=mysqli_query($conn,"SELECT id,nama FROM pelanggan ORDER BY nama")){
    while($x=mysqli_fetch_assoc($r)){
      $pid=htmlspecialchars($x['id']); $pnm=htmlspecialchars($x['nama']);
      $opsi_pelanggan.="<option value=\"$pid\">$pid - $pnm</option>";
    } mysqli_free_result($r);
  }

  // Ambil data barang + harga (disimpan untuk data-harga di <option>)
  $barang_data=[];
  if($r=mysqli_query($conn,"SELECT id,nama_barang,harga FROM barang ORDER BY nama_barang")){
    while($x=mysqli_fetch_assoc($r)) $barang_data[(int)$x['id']]=[$x['nama_barang'],(int)$x['harga']];
    mysqli_free_result($r);
  }
  $opsi_barang='<option value="0">-- Pilih Barang --</option>';
  foreach($barang_data as $bid=>$arr){
    [$bnm,$hrg]=$arr;
    $opsi_barang.='<option value="'.$bid.'" data-harga="'.$hrg.'">'.htmlspecialchars($bid.' - '.$bnm).'</option>';
  }

  $jumlah_baris_detail=5;
  $pesan_sukses=flash('ok');
  $pesan_error=flash('err');
  ?>
  <!doctype html><html lang="id"><head>
  <meta charset="utf-8"><title>Input Nota</title>
  <link rel="stylesheet" href="assets/style.css">
  <style>.kanan{text-align:right}</style>
  </head><body>
  <main class="wadah jarak">
    <h3 class="judul-biru">Form Nota</h3>
    <?php if($pesan_sukses):?><div class="pesan pesanok"><?=$pesan_sukses?></div><?php endif;?>
    <?php if($pesan_error):?><div class="pesan pesanerr"><?=$pesan_error?></div><?php endif;?>
    <div class="kartu bayangan"><div class="isi">
      <div class="">Data Master</div>
      <form method="post" action="nota_simpan.php">
        <div class="flex antara sejajar celah2 bawah3">
          <div style="flex:1"><label class="label">Nomor</label><input class="input" name="nomor" value="<?=htmlspecialchars($nomor_nota)?>" readonly></div>
          <div style="flex:1"><label class="label">Tanggal</label><input class="input" type="date" name="tgl" value="<?=$tanggal?>"></div>
          <div style="flex:1"><label class="label">Status</label><select class="input" name="status"><option>DRAFT</option><option>LUNAS</option></select></div>
        </div>
        <div class="flex antara sejajar celah2 bawah3">
          <div style="flex:1"><label class="label">Pelanggan</label><select class="input" name="pelanggan_id"><?=$opsi_pelanggan?></select></div>
          <div style="flex:1"><label class="label">Kasir</label><input class="input" value="<?=htmlspecialchars($teks_pengguna)?>" readonly><input type="hidden" name="user_id" value="<?=$id_pengguna?>"></div>
        </div>
        <div class="tabelres bawah3">
          <div class="">Data Detail</div>
          <table class="tabel tengahvert">
            <thead><tr><th>No</th><th>Barang</th><th>Harga</th><th>Qty</th><th>Subtotal</th></tr></thead>
            <tbody>
              <?php for($i=0;$i<$jumlah_baris_detail;$i++):?>
                <tr>
                  <td class="tengah"><?=$i+1?></td>
                  <td><select class="input barangSel" name="barang_id[]"><?=$opsi_barang?></select></td>
                  <td class="kanan hargaTeks">0</td>
                  <td><input class="input qtyInput" type="number" name="qty[]" min="0" value="0"></td>
                  <td class="kanan subtotalTeks">0</td>
                </tr>
              <?php endfor;?>
            </tbody>
            <tfoot><tr><th colspan="4" class="kanan">Total</th><th class="kanan" id="total_nominal">0</th></tr></tfoot>
          </table>
        </div>
        <div class="flex antara sejajar">
          <a class="tombol awas kecil" href="nota_input.php">Reset</a>
          <button type="submit" class="tombol sukses">Simpan</button>
        </div>
      </form>
    </div></div>
  </main>
  <script>
  /**
  * format
  * Format angka ke locale Indonesia (ribuan titik).
  */
  function format(x){return x.toLocaleString('id-ID');}
  /**
  * hitung
  * Menghitung subtotal tiap baris dan total keseluruhan
  * berdasarkan harga (data-harga pada option terpilih) dan qty input.
  */
  function hitung(){
    let total=0;
    document.querySelectorAll('tbody tr').forEach(tr=>{
      let sel=tr.querySelector('.barangSel');
      let harga=parseInt(sel.selectedOptions[0]?.dataset.harga||0);
      tr.querySelector('.hargaTeks').textContent=format(harga);
      let qty=parseInt(tr.querySelector('.qtyInput').value||0);
      let sub=harga*qty;
      tr.querySelector('.subtotalTeks').textContent=format(sub);
      total+=sub;
    });
    document.getElementById('total_nominal').textContent=format(total);
  }
  document.querySelectorAll('.barangSel,.qtyInput').forEach(el=>el.addEventListener('change',hitung));
  </script>
  </body></html>