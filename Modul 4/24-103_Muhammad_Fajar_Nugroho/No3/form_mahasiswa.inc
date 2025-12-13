<form action="registrasi_mahasiswa.php" method="POST">
    <h2>Form Registrasi Mahasiswa</h2>
    <div>
        <label for="nim">NIM (10 digit):</label>
        <input type="number" name="nim" id="nim" value="<?php echo htmlspecialchars($nim); ?>">
        <?php if (isset($errors['nim'])): ?>
            <div><strong><?php echo $errors['nim']; ?></strong></div>
        <?php endif; ?>
    </div>
    <br>

    <div>
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>">       
        <?php if (isset($errors['nama'])): ?>
            <div><strong><?php echo $errors['nama']; ?></strong></div>
        <?php endif; ?>
    </div>
    <br>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if (isset($errors['email'])): ?>
            <div><strong><?php echo $errors['email']; ?></strong></div>
        <?php endif; ?>
    </div>
    <br>

    <div>
        <label for="password">Password (Minimal 8 karakter):</label>
        <input type="password" name="password" id="password" value="">
        <?php if (isset($errors['password'])): ?>
            <div><strong><?php echo $errors['password']; ?></strong></div>
        <?php endif; ?>
    </div>
    <br>
    
    <div>
        <label for="konfirmasi_password">Konfirmasi Password:</label>
        <input type="password" name="konfirmasi_password" id="konfirmasi_password" value="">
        <?php if (isset($errors['konfirmasi_password'])): ?>
            <div><strong><?php echo $errors['konfirmasi_password']; ?></strong></div>
        <?php endif; ?>
    </div>
    <br>

    <div>
        <input type="submit" name="submit" value="Daftarkan Mahasiswa">
    </div>
</form>

