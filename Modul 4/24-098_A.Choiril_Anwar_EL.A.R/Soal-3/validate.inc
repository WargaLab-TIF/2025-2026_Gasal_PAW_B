<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z' -]+$/";
    if (empty(trim($field_list[$field_name] ?? ''))) {
        $errors[$field_name] = 'Nama wajib diisi.';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Nama hanya boleh huruf dan spasi.';
    }
}

function validateEmail(&$errors, $field_list, $field_name)
{
    $email = strtolower(trim($field_list[$field_name] ?? ''));
    if (empty($email)) {
        $errors[$field_name] = 'Email wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid.';
    } elseif (!preg_match("/@student\.trunojoyo\.ac\.id$/", $email)) {
        $errors[$field_name] = 'Pake email kampus yaa (@student.trunojoyo.ac.id).';
    }
}

function validateNIM(&$errors, $field_list, $field_name)
{
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = 'NIM wajib diisi.';
    } elseif (!is_numeric($field_list[$field_name])) {
        $errors[$field_name] = 'NIM cuman boleh angka.';
    }
}

function validatePassword(&$errors, $field_list, $field_name)
{
    $password = $field_list[$field_name] ?? '';
    if (empty($password)) {
        $errors[$field_name] = 'Password wajib diisi.';
    } elseif (strlen($password) < 6) {
        $errors[$field_name] = 'Password minimal 6 karakter.';
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors[$field_name] = 'Password harus ada huruf besar.';
    }
}

function validateIPK(&$errors, $field_list, $field_name)
{
    if (empty($field_list[$field_name])) {
        $errors[$field_name] = 'IPK wajib diisi.';
    } elseif (!filter_var($field_list[$field_name], FILTER_VALIDATE_FLOAT)) {
        $errors[$field_name] = 'IPK berupa angka desimal.';
    }
}

function validateTanggal(&$errors, $field_list, $field_name)
{
    $tgl = $field_list[$field_name] ?? '';
    if (empty($tgl)) {
        $errors[$field_name] = 'Tanggal lahir wajib diisi.';
    } else {
        $pecah = explode('-', $tgl);
        if (count($pecah) == 3) {
            [$year, $month, $day] = $pecah;
            if (!checkdate((int)$month, (int)$day, (int)$year)) {
                $errors[$field_name] = 'Tanggal lahir tidak valid.';
            }
        } else {
            $errors[$field_name] = 'Format tanggal tidak valid.';
        }
    }
}
?>