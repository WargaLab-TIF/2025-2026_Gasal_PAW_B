<?php
function halo(){ echo "Halo Dunia!<br>"; }
function sapa($nama){ echo "Halo $nama<br>"; }
function tambah($a,$b){ return $a + $b; }
function nama($nama="Anonim"){ echo "Hai $nama<br>"; }

halo();
sapa("kannz");
echo "Hasil tambah: "tambah(5,7)."<br>";
nama();
nama("okan");
?>
