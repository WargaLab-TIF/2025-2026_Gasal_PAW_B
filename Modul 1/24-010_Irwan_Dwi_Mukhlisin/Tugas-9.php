<?php
function tanpa_argumen()
{
    echo "Hello World<br>";
}
function dengan_argumen($data)
{
    echo "$data<br>";
}
function argumenLebihDari1($data1, $data2)
{
    echo "$data1<br>";
    echo "$data2<br>";
}
function denganDefault($data = "Teknik Informatika")
{
    echo "$data<br>";
}
function nilaiReturn($a, $b)
{
    return $a * $b;
}

tanpa_argumen();
dengan_argumen("Hello World");
argumenLebihDari1("hello", "world");
denganDefault();
echo nilaiReturn(10, 5);
?>