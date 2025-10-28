<form action="processData.php" method="POST">
    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama"
           value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>"
           placeholder="Masukkan nama lengkap">
    <?php if (!empty($errors['nama'])) echo "<span style='color:red;'> ({$errors['nama']})</span>"; ?>
    <br><br>

    <label>Email:</label><br>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
           placeholder="nama@email.com">
    <?php if (!empty($errors['email'])) echo "<span style='color:red;'> ({$errors['email']})</span>"; ?>
    <br><br>

    <label>Program Studi:</label><br>
    <input type="text" name="prodi"
           value="<?php echo htmlspecialchars($_POST['prodi'] ?? ''); ?>"
           placeholder="prodi anda">
    <?php if (!empty($errors['prodi'])) echo "<span style='color:red;'> ({$errors['prodi']})</span>"; ?>
    <br><br>

    <label>Alamat:</label><br>
    <textarea name="alamat" rows="3" cols="30" placeholder="Masukkan alamat lengkap"><?php echo htmlspecialchars($_POST['alamat'] ?? ''); ?></textarea>
    <?php if (!empty($errors['alamat'])) echo "<span style='color:red;'> ({$errors['alamat']})</span>"; ?>
    <br><br>

    <label>Provinsi:</label><br>
    <select name="provinsi">
        <?php
        $provinsi_list = ["Jawa Timur", "Jawa Barat", "Jawa Tengah", "DKI Jakarta", "Bali"];
        $selected = $_POST['provinsi'] ?? '';
        foreach ($provinsi_list as $prov) {
            $isSelected = ($prov == $selected) ? 'selected' : '';
            echo "<option value='$prov' $isSelected>$prov</option>";
        }
        ?>
    </select>
    <br><br>

    <label>Jenis Kelamin:</label><br>
    <input type="radio" name="gender" value="Laki-laki"
        <?php if (($_POST['gender'] ?? '') == 'Laki-laki') echo 'checked'; ?>> Laki-laki
    <input type="radio" name="gender" value="Perempuan"
        <?php if (($_POST['gender'] ?? '') == 'Perempuan') echo 'checked'; ?>> Perempuan
    <?php if (!empty($errors['gender'])) echo "<span style='color:red;'> ({$errors['gender']})</span>"; ?>
    <br><br>

    <label>Apakah Anda Mahasiswa?</label>
    <input type="checkbox" name="mahasiswa" value="Ya" <?php if(isset($_POST['mahasiswa'])) echo 'checked'; ?>>
    <br><br>

    <input type="submit" value="Kirim">
    <input type="reset" value="Bersihkan">
</form>