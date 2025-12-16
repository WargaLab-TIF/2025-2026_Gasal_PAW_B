<form action="processData.php" method="POST">
      <label for="surname">Nama : </label>
      <br />
      <input type="text" name="surname" id="surname" value="<?php
            if(isset($old_data['surname'])) {
               echo htmlspecialchars($old_data['surname']);
           }
           ?>"/>
      <br />
      <label for="email">Email:</label><br>
      <input type="text" name="email" id="email"value="<?php
            if(isset($old_data['email'])){
                  echo htmlspecialchars($old_data['email']);
            } 
            ?>"/>
      <br>
      <label for="alamat">Alamat : </label>
      <br />
      <input type="text" name="alamat" id="alamat"value="<?php
            if(isset($old_data['alamat'])){
                  echo htmlspecialchars($old_data['alamat']);
            } 
            ?>"/>
      <br /><br />
      <button type="submit" name="submit">Submit</button>
</form>