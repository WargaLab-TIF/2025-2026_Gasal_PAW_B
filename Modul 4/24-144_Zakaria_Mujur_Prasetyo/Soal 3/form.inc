<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <h3>Form Data Mahasiswa</h3>

  <label>Nama</label>
  <input type="text" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>" />
  <?php if (!empty($errors['nama'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['nama']); ?>)</small><?php endif; ?>
  <br />

  <label>NIM</label>
  <input type="text" name="nim" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>" />
  <?php if (!empty($errors['nim'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['nim']); ?>)</small><?php endif; ?>
  <br />

  <label>Email</label>
  <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
  <?php if (!empty($errors['email'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['email']); ?>)</small><?php endif; ?>
  <br />

  <label>Password</label>
  <input type="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" />
  <?php if (!empty($errors['password'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['password']); ?>)</small><?php endif; ?>
  <br />

  <label>Tanggal Lahir</label>
  <input type="date" name="tanggal_lahir" value="<?php echo isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : ''; ?>" />
  <?php if (!empty($errors['tanggal_lahir'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['tanggal_lahir']); ?>)</small><?php endif; ?>
  <br />

  <label>URL (opsional)</label>
  <input type="url" name="url" value="<?php echo isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''; ?>" />
  <?php if (!empty($errors['url'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['url']); ?>)</small><?php endif; ?>
  <br />

  <label>IP (opsional)</label>
  <input type="text" name="ip" value="<?php echo isset($_POST['ip']) ? htmlspecialchars($_POST['ip']) : ''; ?>" />
  <?php if (!empty($errors['ip'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['ip']); ?>)</small><?php endif; ?>
  <br />

  <label>IPK</label>
  <input type="text" name="ipk" value="<?php echo isset($_POST['ipk']) ? htmlspecialchars($_POST['ipk']) : ''; ?>" />
  <?php if (!empty($errors['ipk'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['ipk']); ?>)</small><?php endif; ?>
  <br />

  <label>Alamat</label><br />
  <textarea name="alamat" rows="3"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
  <?php if (!empty($errors['alamat'])): ?><br /><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['alamat']); ?>)</small><?php endif; ?>
  <br />

  <label>Program Studi</label>
  <select name="prodi">
    <option value="">--Pilih Prodi--</option>
    <option value="TI" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'TI') ? 'selected' : ''; ?>>TI</option>
    <option value="SI" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'SI') ? 'selected' : ''; ?>>SI</option>
    <option value="MI" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'MI') ? 'selected' : ''; ?>>MI</option>
  </select>
  <?php if (!empty($errors['prodi'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['prodi']); ?>)</small><?php endif; ?>
  <br />

  <label>Gender</label>
  <input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'checked' : ''; ?> /> Male
  <input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'checked' : ''; ?> /> Female
  <?php if (!empty($errors['gender'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['gender']); ?>)</small><?php endif; ?>
  <br />

  <button type="submit">Submit</button>
  <button type="reset">Reset</button>
</form>
