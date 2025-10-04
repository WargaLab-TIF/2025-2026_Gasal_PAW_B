<?php

function status(){
    $sts = "Jomblo";
    echo "Status anda $sts <br>";
}

function perasaan($prsn){
    echo "Bagaimana perasaan anda ? $prsn <br>";
}

function keinginan($rs1, $rs2){
    echo "Ingin sekali rasanya $rs1 dan $rs2 <br>";
}

function parameter($angka = 50){
    echo "Parameter kehidupan = $angka % <br>";
}

function hitung($x, $y){
    $z = $x - $y;
    return $z;
}

status();
perasaan("sedih");
keinginan("bahagia", "dicintai");
parameter(0);
parameter();
echo "Parameter dicintai 25-100 = " . hitung(25, 100);
?>