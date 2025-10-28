<h3>Prosted Data: </h3>
<?php

// $data = $_POST;

// if ($data['username']== ''){ 
//     echo "isi nama terlebih dahulu";
// }elseif ($data['email']== ''){
//     echo "isi email terlebih dahulu";
// }elseif ($data['password']== ''){
//     echo "isi password terlebih dahulu";
// } else {foreach($_POST as $key => $value){
//     echo "$key => $value<br>";
//     }
// }

// require 'validate.inc' ;
// if(validateName($_POST, 'username')){
//     echo "data ok";
// }else{
//     echo "data invalid";
// }

require 'validate.inc';
$errors = array(); validateName($errors, $_POST, 'username');

if($errors){
    echo "Errors: <br>";
    foreach($errors as $field => $errors){
        echo "$field $errors";
    }
}else{
    echo "Dta OK";
}
?>

