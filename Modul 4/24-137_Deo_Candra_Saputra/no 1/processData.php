<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Posted Data</title>
  <style>
    body {font-family: Arial, sans-serif;background-color: #f5f5f5;}
    .output-box {width: 420px;margin: 40px auto;background-color: #e8e6fa;border: 1px solid #999;border-radius: 4px;padding: 15px 25px;box-shadow: 2px 2px 8px rgba(0,0,0,0.2);}h3 {color: #333;margin-top: 0;}pre {background: #fff;border: 1px solid #ccc;padding: 10px;font-size: 14px;line-height: 1.4;white-space: pre-wrap;}
  </style>
</head>
<body>
  <div class="output-box">
    <h3>Posted data:</h3>
    <pre>
    <?php
    // cara saya menampilkan data pada tpp
    // foreach ($_POST as $key => $value) {
    //     echo "($key) => ($value)\n";
    // }

    // soal no 1.2
    // require 'validate.inc';
    // if(validateName($_POST, 'surname')){
    //     echo 'Data OK';
    // }else{
    //     echo 'Data invalid';
    // }
    
    // // soal no 1.5
    require 'validate.inc';

    $errors = array();

    validateName($errors, $_POST, 'surname');

    if ($errors) {
        echo "Errors:<br/>";
        foreach ($errors as $field => $error) {
            echo "$field : $error<br/>";
        }
    } else {
        echo "Data OK!";
    }

    ?>
    </pre>
  </div>
</body>
</html>
