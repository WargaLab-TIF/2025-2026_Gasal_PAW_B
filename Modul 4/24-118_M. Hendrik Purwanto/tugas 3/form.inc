<form action="index.php" method="POST" novalidate>
    <div class="form-group">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>">
        <span class="error"><?php echo $errors['nama'] ?? ''; ?></span>
    </div>
    
    <div class="form-group">
        <label for="nim">NIM (10 digit):</label>
        <input type="text" name="nim" id="nim" value="<?php echo htmlspecialchars($_POST['nim'] ?? ''); ?>">
        <span class="error"><?php echo $errors['nim'] ?? ''; ?></span>
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
    </div>

    <div class="form-group">
        <label for="password">Password (min 8 karakter):</label>
        <input type="password" name="password" id="password" value="">
        <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
    </div>

    <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo htmlspecialchars($_POST['tgl_lahir'] ?? ''); ?>">
        <span class="error"><?php echo $errors['tgl_lahir'] ?? ''; ?></span>
    </div>

    <div class="form-group">
        <label for="ipk">IPK (0.00 - 4.00):</label>
        <input type="text" name="ipk" id="ipk" value="<?php echo htmlspecialchars($_POST['ipk'] ?? ''); ?>">
        <span class="error"><?php echo $errors['ipk'] ?? ''; ?></span>
    </div>

    <div class="form-group">
        <label for="website">Website (Opsional):</label>
        <input type="url" name="website" id="website" value="<?php echo htmlspecialchars($_POST['website'] ?? ''); ?>">
        <span class="error"><?php echo $errors['website'] ?? ''; ?></span>
    </div>
    
    <button type="submit" name="submit">Daftar</button>
</form>