<style> 
    .field { margin-bottom: 10px; } 
    label { display: inline-block; width: 100px; }
</style>

<legend>Input Data Mahasiswa</legend>
<div class="field">
    <label for="nama">Nama</label>
    <input type="text" name="nama"
           value="<?php if(isset($_POST['nama'])) echo htmlspecialchars($_POST['nama']); ?>"/>
</div>
<div class="field">
    <label for="nim">NIM</label>
    <input type="text" name="nim"
           value="<?php if(isset($_POST['nim'])) echo htmlspecialchars($_POST['nim']); ?>"/>
</div>
<div class="field">
    <label for="email">Email</label>
    <input type="text" name="email"
           value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"/>
</div>
<div class="field">
    <label for="password">Password</label>
    <input type="password" name="password"/>
    </div>
<div class="field">
    <label>&nbsp;</label>
    <input type="submit" value="Daftar" name="submit" />
</div>