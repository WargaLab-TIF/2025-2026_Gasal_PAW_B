<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <label for="nama">Nama</label><br>
  <input type="text" id="nama" name="nama" value="<?php echo isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : ''; ?>">
  <?php if (!empty($errors['nama'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['nama']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="nim">NIM</label><br>
  <input type="text" id="nim" name="nim" value="<?php echo isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : ''; ?>">
  <?php if (!empty($errors['nim'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['nim']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="email">Email</label><br>
  <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
  <?php if (!empty($errors['email'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['email']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="password">Password</label><br>
  <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
  <?php if (!empty($errors['password'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['password']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="tanggal_lahir">Tanggal Lahir</label><br>
  <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : ''; ?>">
  <?php if (!empty($errors['tanggal_lahir'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['tanggal_lahir']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="url">URL (opsional)</label><br>
  <input type="url" id="url" name="url" value="<?php echo isset($_POST['url']) ? htmlspecialchars($_POST['url']) : ''; ?>">
  <?php if (!empty($errors['url'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['url']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="ip">IP Address (opsional)</label><br>
  <input type="text" id="ip" name="ip" value="<?php echo isset($_POST['ip']) ? htmlspecialchars($_POST['ip']) : ''; ?>">
  <?php if (!empty($errors['ip'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['ip']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="ipk">IPK</label><br>
  <input type="text" id="ipk" name="ipk" value="<?php echo isset($_POST['ipk']) ? htmlspecialchars($_POST['ipk']) : ''; ?>">
  <?php if (!empty($errors['ipk'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['ipk']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="alamat">Alamat</label><br>
  <textarea id="alamat" name="alamat" rows="3"><?php echo isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : ''; ?></textarea>
  <?php if (!empty($errors['alamat'])): ?><br><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['alamat']); ?>)</small><?php endif; ?>
  <br><br>

  <label for="prodi">Program Studi</label><br>
  <select id="prodi" name="prodi">
    <option value="">--Pilih Prodi--</option>
    <option value="Teknik Informatika" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'Teknik Informatika') ? 'selected' : ''; ?>>Teknik Informatika</option>
    <option value="Sistem Informasi" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
    <option value="Teknologi Informasi" <?php echo (isset($_POST['prodi']) && $_POST['prodi'] === 'Teknologi Informasi') ? 'selected' : ''; ?>>Teknologi Informasi</option>
  </select>
  <?php if (!empty($errors['prodi'])): ?><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['prodi']); ?>)</small><?php endif; ?>
  <br><br>

  <label>Gender</label><br>
  <input type="radio" id="male" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'checked' : ''; ?>>
  <label for="male">Male</label>
  <input type="radio" id="female" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'checked' : ''; ?>>
  <label for="female">Female</label>
  <?php if (!empty($errors['gender'])): ?><br><small style="color:#b00020;">(<?php echo htmlspecialchars($errors['gender']); ?>)</small><?php endif; ?>
  <br><br>

  <button type="submit">Submit</button>
  <button type="reset">Reset</button>
</form>