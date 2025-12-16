<h3>Posted Data</h3>
<?php
require 'validate.inc';
$errors = array(); 
validateName($errors, $_POST, 'surname');

if($errors){
    echo "Error :<br>";
    foreach($errors as $field => $error){
        echo "$field $error <br>";
    }
} else {
    echo "Data OK";
    foreach($_POST as $value => $key){
        echo "($value) => ($key) <br>";
    }
}

// require 'validate.inc';
// if(validateName($_POST, 'surname')){
//     echo "Data OK";
// } else {
//     echo "Data Invalid";
// }

// if ($_POST['surname'] == ''){
//     echo "Nama tidak boleh kosong";
// } elseif ($_POST['email'] == ''){
//     echo "Email tidak boleh kosong";
// } elseif ($_POST['password'] == ''){
//     echo "Password tidak boleh kosong";
// }else {
//     foreach($_POST as $value => $key){
//         echo "($value) => ($key) <br>";
//     }
// }


?>