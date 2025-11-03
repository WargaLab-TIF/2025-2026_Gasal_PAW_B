<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "validate.inc";
    if (empty($errors)) {

        $_SESSION['success'] = 'Mahasiswa berhasil disimpan (demo).';

        $_SESSION['csrf'] = bin2hex(random_bytes(16));

        $_SESSION['saved'] = [
            'name' => htmlspecialchars($values['name'], ENT_QUOTES),
            'student_id' => htmlspecialchars($values['student_id'], ENT_QUOTES),
            'email' => htmlspecialchars($values['email'], ENT_QUOTES),
            'dob' => $values['dob_display'] ?? '',
            'gpa' => isset($values['gpa']) ? $values['gpa'] : '',
            'website' => htmlspecialchars($values['website'], ENT_QUOTES),
            'ip' => htmlspecialchars($values['ip'], ENT_QUOTES),
            'bio' => htmlspecialchars($values['bio'], ENT_QUOTES),
        ];

    }
}

$success_msg = '';
$saved = null;
if (isset($_SESSION['success'])) {
    $success_msg = $_SESSION['success'];
    $saved = $_SESSION['saved'] ?? null;
    unset($_SESSION['success'], $_SESSION['saved']);
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Form Input Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 20px auto;
            padding: 10px;
        }

        form {
            padding: 16px;
            border-radius: 8px;
        }

        .field {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
        }

        .error {
            color: #b00020;
        }

        .success {
            color: #006600;
            font-weight: 700;
        }

    </style>
</head>

<body>
    <h1>Form Input Data Mahasiswa (Server-side Validation)</h1>

    <?php if ($success_msg): ?>
        <div class="success"><?php echo htmlspecialchars($success_msg); ?></div>
        <?php if ($saved): ?>
            <h3>Data tersimpan (demo):</h3>
            <ul>
                <li><strong>Nama:</strong> <?php echo $saved['name']; ?></li>
                <li><strong>NIM:</strong> <?php echo $saved['student_id']; ?></li>
                <li><strong>Email:</strong> <?php echo $saved['email']; ?></li>
                <li><strong>Tanggal Lahir:</strong> <?php echo $saved['dob']; ?></li>
                <li><strong>GPA:</strong> <?php echo $saved['gpa']; ?></li>
                <li><strong>Website:</strong> <?php echo $saved['website']; ?></li>
                <li><strong>IP:</strong> <?php echo $saved['ip']; ?></li>
                <li><strong>Bio:</strong> <?php echo $saved['bio']; ?></li>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($errors) && is_array($errors)): ?>
        <div class="error">
            <p><strong>Ada beberapa kesalahan pada input Anda:</strong></p>
            <ul>
                <?php foreach ($errors as $k => $e): ?>
                    <li><?php echo htmlspecialchars($e); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="field">
            <label for="name">Nama lengkap</label>
            <input id="name" name="name" type="text" value="<?php echo htmlspecialchars($values['name'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="student_id">NIM</label>
            <input id="student_id" name="student_id" type="text" value="<?php echo htmlspecialchars($values['student_id'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($values['email'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="password">Password (min 8 karakter, harus mengandung huruf & angka)</label>
            <input id="password" name="password" type="password" value="">
        </div>

        <div class="field">
            <label>Tanggal Lahir</label>
            <div style="display:flex; gap:8px;">
                <select name="day">
                    <option value="">Day</option>
                    <?php for ($d = 1; $d <= 31; $d++): ?>
                        <option value="<?php echo $d; ?>" <?php if (($values['day'] ?? '') == $d) echo 'selected'; ?>><?php echo $d; ?></option>
                    <?php endfor; ?>
                </select>
                <select name="month">
                    <option value="">Month</option>
                    <?php for ($m = 1; $m <= 12; $m++): ?>
                        <option value="<?php echo $m; ?>" <?php if (($values['month'] ?? '') == $m) echo 'selected'; ?>><?php echo $m; ?></option>
                    <?php endfor; ?>
                </select>
                <select name="year">
                    <option value="">Year</option>
                    <?php for ($y = date('Y'); $y >= 1950; $y--): ?>
                        <option value="<?php echo $y; ?>" <?php if (($values['year'] ?? '') == $y) echo 'selected'; ?>><?php echo $y; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <div class="field">
            <label for="gpa">GPA/IPK</label>
            <input id="gpa" name="gpa" type="text" value="<?php echo htmlspecialchars($values['gpa'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="website">Website (opsional)</label>
            <input id="website" name="website" type="text" value="<?php echo htmlspecialchars($values['website'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="ip">IP Address (opsional)</label>
            <input id="ip" name="ip" type="text" value="<?php echo htmlspecialchars($values['ip'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="age">Umur (opsional)</label>
            <input id="age" name="age" type="text" value="<?php echo htmlspecialchars($values['age'] ?? ''); ?>">
        </div>

        <div class="field">
            <label for="bio">Bio (maks 500 karakter)</label>
            <textarea id="bio" name="bio" rows="4"><?php echo htmlspecialchars($values['bio'] ?? ''); ?></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>

</body>

</html>