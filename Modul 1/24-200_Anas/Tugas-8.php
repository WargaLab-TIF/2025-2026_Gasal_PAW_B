<?php
    $name ="sunar";
    echo "$name adalah isi dari variabel name<br>";
    echo strlen($name);
    echo "<br>";
    echo str_word_count($name);
    echo "<br>";
    echo strrev($name);
    echo "<br>";
    $posisi = strpos($name, 'n');
    echo $posisi;
    echo "<br>";
    $newname = str_replace("sunar","sudar",$name);
    echo $newname;
?>