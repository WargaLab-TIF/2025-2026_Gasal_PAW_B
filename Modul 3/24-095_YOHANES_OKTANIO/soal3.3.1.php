<?php
   $fruits =  array("Avocado","Bluebery","Chery");
    echo "I like".$fruits[0].",".$fruits[1].",".$fruits[2];
    echo "<br>";

    array_push($fruits,"Manggo","Melon","Watermelon","Apple","Kurma");
    echo $fruits[7];

    echo "<br>";

    array_pop($fruits);
    echo $fruits[6]."<br>";

    $vagies = array("Bayam", "Brokoli", "Tomat");
    foreach($vagies as $vagie) {
        echo $vagie."<br>";
    }
?>