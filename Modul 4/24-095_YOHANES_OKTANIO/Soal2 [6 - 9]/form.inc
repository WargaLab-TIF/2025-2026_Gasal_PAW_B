 <form action="" method="post">
     <fieldset>
         <legend>Person Details</legend>
         <div class="field">
             <label for="surname">surname</label>
             <input type="text" name="surname" size="31"  value="<?php  echo $_POST['surname'] ?? ""; ?>">
         </div>

         <div class="field">
             <label for="email">Email Address</label>
             <input type="email" name="email" size="31"  value="<?php  echo $_POST['email'] ?? ""; ?>">
         </div>
         <div class="field">
             <label for="password">Password</label>
             <input type="password" name="password" size="31"  value="<?php  echo $_POST['password'] ?? ""; ?>">
         </div>
         <div class="field">
             <label for="address">Street Address</label>
             <div class="space">

                 <textarea row="3" cols="22" name="address"> <?php  echo $_POST['address'] ?? ""; ?> </textarea>
             </div>
         </div>
         <div class="field">
             <label for="state">State</label>
             <div class="space">

                 <select name="state" id="state"  value="<?php  echo $_POST['state'] ?? ""; ?>">
                     <option value="-1">[ choose your state ]</option>
                     <option value="1">indonesia</option>
                     <option value="2">English US</option>
                     <option value="3">Victoria</option>
                     <option value="4">South Australia</option>
                     <option value="5">Western Australia</option>
                 </select>
             </div>

         </div>
         <div class="field">
             <input type="hidden" name="country" value="Australia">
         </div>
         <div class="field">
             <label for="gender">Gender</label>
             <div class="space">
                 <input type="radio" name="gender" value="Male"> Male
                 <input type="radio" name="gender" value="Female"> Female
             </div>
         </div>
         <div class="field">
             <label for="vegetarian">Vegetarian</label>
             <div class="space">
                 <input type="checkbox" name="vegetarian" size="31">
             </div>
         </div>
         <div class="field">
             <label for=""></label>
             <div class="space">
                 <input type="submit" name="submit" value="Submit">
                 <input type="reset" name="reset" value="Reset">
             </div>
         </div>
     </fieldset>
 </form>