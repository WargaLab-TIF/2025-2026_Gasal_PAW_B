<?php
// tanpa argumen
function tanpaArgumen() {
    echo "Hello Word Syadat";
}

// dengan 1 argumen
function denganSatuArgumen($nama) {
    echo "Hello, " . $nama;
}

// dengan lebih dari 1 argumen
function denganDuaArgumen($nama, $umur) {
    echo "Halo, nama saya " . $nama . ". Saya berumur " . $umur . " tahun.";
}

// dengan default value
function denganDefaultValue($nama = "Syadat", $umur = 20) {
    echo "Halo, nama saya " . $nama . ". Saya berumur " . $umur . " tahun.";
}

// yang mengembalikan nilai (return)
function denganReturn($nama, $umur) {
    return "Halo, nama saya " . $nama . ". Saya berumur " . $umur . " tahun.";
}

tanpaArgumen();
echo "<br>";
denganSatuArgumen("Syadat");
echo "<br>";
denganDuaArgumen("Syadat", 20);
echo "<br>";
denganDefaultValue();
echo "<br>";
echo denganReturn("Syadat", 20);
?>