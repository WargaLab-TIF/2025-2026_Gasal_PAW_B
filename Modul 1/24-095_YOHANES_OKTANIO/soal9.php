<!-- 9. Fungsi dalam PHP:
• Fungsi dasar tanpa argumen.
• Fungsi dengan 1 argumen.
• Fungsi dengan lebih dari 1 argumen.
• Fungsi dengan default value.
• Fungsi yang mengembalikan nilai (return). -->

<?php
// • Fungsi dasar tanpa argumen.
function Ping(){
    echo "Pong <br>";
}; Ping();

// • Fungsi dengan 1 argumen.

function rekomenDistro($punya_kehidupan) {
    echo "Saran Distro : ";
    if ($punya_kehidupan){
        echo "Apapun aja yang simple , saran Ubuntu Family <br>";
    } else {
        echo "Arch! <br>";
    }
}
rekomenDistro(false);

// • Fungsi dengan lebih dari 1 argumen.

function buatLinkGit($username,$reponame){

    $link = "https://github.com/$username/$reponame";
    echo "<a href='$link'>$link</a> <br>";
}

buatLinkGit("yohanesokta","WebServices-Gajah");

// • Fungsi dengan default value.
function instalasiDestination($diskPath = "C", $destination = "\\Gajahweb\\") {
    echo "$diskPath:$destination";
}

instalasiDestination("D");
echo "<br>";
// • Fungsi yang mengembalikan nilai (return).

function perkalian($a,$b) {
    return $a * $b;
}

echo perkalian(3,10);


?>