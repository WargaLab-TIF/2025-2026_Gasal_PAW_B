<?php
$menu = array(
    "Nasi Pecel"=>"7000",
    "Nasi Lodeh"=>"8000",
    "Nasi Ayam Geprek"=>"10000",
    "Nasi Bali Ayam"=>"9000",
    "Total harga keseluruhan"=>"34000"
);

echo "Pilihan Menu dan Harga <br> <br>";
foreach($menu as $k => $v){
    echo "$k = $v <br>";
}
?>