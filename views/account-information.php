  <section class="account-form">
    <form action="#" method='post'>
      <fieldset>
          <h3>Your Information</h3>

          <input class="register-name" type="text" value='<?php echo $user[0]['fullname']; ?>' name="name" placeholder="Name"><br>

          <input class="register-email" type="email" value='<?php echo $user[0]['email']; ?>' name="email" placeholder="Emailadress"><br>

          <input class="register-adress" type="text" name="adress" value='<?php echo $user[0]['street_and_number']; ?>' placeholder="Street and Number"><br>

          <div class="short">

          <input class="register-zip" type="text" value='<?php echo $user[0]['zip']; ?>' name="zip" placeholder="ZIP"><br>

          <input class="register-location" type="text" value='<?php echo $user[0]['location']; ?>' name="location" placeholder="Location"><br>
          </div>

          <input class="register-country" type="text" value='<?php echo $user[0]['country']; ?>' name="country" placeholder="Country"><br>

          <div class="shipping-alternative-wrapper">
            <input class="shipping-alternative" id="shipping-alternative" value="alt_shipping_adress" type="checkbox" name="alternative_checkbox" checked>
            <label class="shipping-alternative-label" for="shipping-alternative"><span></span>Alternative Invoiceadress</label>
          </div>


          <input class="invoice-adress" type="text" name="alt_adress" value="<?php echo $user[0]['alt_street_and_number']; ?>" placeholder="Street and Number" disabled><br>

          <div class="short">
            <input class="invoice-zip" type="text" name="alt_zip" value="<?php echo $user[0]['alt_zip']; ?>" placeholder="Zip" disabled><br>
            <input class="invoice-location" type="text" name="alt_location" value="<?php echo $user[0]['alt_location']; ?>" placeholder="Location" disabled><br>
          </div>

          <input class="invoice-country" type="text" name="alt_country" value="<?php echo $user[0]['alt_country']; ?>" placeholder="Country" disabled><br>
          <div class="account-btn-wrapper">
            <a class='account-change-password' href="index.php?site=pwdreset">Change Password</a>
            <input name='sbmbtn' class="account-update-submit <?php if(isset($account_information_success)){echo 'account_information_success';}?>" type="submit" value="<?php if(isset($account_information_success)){echo '✓';}else{echo 'Update';}?>">
          </div>

          <div class="error"><p><?php if(isset($errors)){foreach ($errors as $key) {echo $key;}} ?></p></div>
      </fieldset>
    </form>
  </section>
