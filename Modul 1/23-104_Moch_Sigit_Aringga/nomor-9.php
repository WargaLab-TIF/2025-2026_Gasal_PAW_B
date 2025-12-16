<?php
function halo()
{
    echo "Halo! <br>";
}

function nama($nama)
{
    echo "Halo, $nama! how are you? <br>";
}

function biodata($nama, $umur)
{
    echo "my name is $nama and i am $umur years old. <br>";
}

function sapauser($nama = "user")
{
    echo "Wellcome, $nama! <br>";
}

function hitungLuasPersegi($sisi)
{
    $luas = $sisi * $sisi;
    return $luas;
}


echo "<h3>soal nomor 9 Fungsi</h3>";

halo();
nama("ariii");
biodata("ariii", 21);
sapauser();
sapauser();


$sisiPersegi = 10;
$luasPersegi = hitungLuasPersegi($sisiPersegi);
echo "Luas persegi dengan sisi $sisiPersegi adalah $luasPersegi.";
