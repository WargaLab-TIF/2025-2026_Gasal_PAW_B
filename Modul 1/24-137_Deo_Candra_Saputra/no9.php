<?php
function tanpa_argumen() {
    echo "Deo Candra Saputra <br>";
}

function dengan_argumen($nim) {
    echo $nim. "<br>";
}
function argumen_lebih_dari1($nama,$nim){
    echo $nama . "<br>";
    echo $nim . "<br>";
}
function default_value($nama="Deo Candra Saputra"){
    echo $nama."<br>";
}
function mengembalikan_nilai($x,$y){
    return $x / $y;
}
tanpa_argumen();
dengan_argumen("240411100137");
argumen_lebih_dari1("Deo Candra Saputra","240411100137");
default_value();
echo mengembalikan_nilai(8000,120)."<br>";
?>