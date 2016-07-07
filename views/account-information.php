  <section class="account-form">
    <form action="index.php?site=register" method='post'>
      <fieldset>
          <h3>Your Information</h3>

          <input class="register-name" type="text" value='<?php echo $user[0]['fullname']; ?>' name="name" placeholder="Name"><br>

          <input class="register-email" type="email" value='<?php echo $user[0]['email']; ?>' name="email" placeholder="Emailadress"><br>

          <input class="register-adress" type="text" name="text" placeholder="Street and Number"><br>

          <div class="short">

          <input class="register-zip" type="text" value='<?php echo $user[0]['zip_and_location']; ?>' name="zip" placeholder="ZIP"><br>

          <input class="register-country" type="text" value='<?php echo $user[0]['country']; ?>' name="country" placeholder="Country"><br>
          </div>

          <input name='sbmbtn' class="register-submit" type="submit" value="Update">
          <div class="error"><p><?php if(isset($error_message)){foreach ($error_message as $key) {echo $key;}} ?></p></div>
      </fieldset>
    </form>
  </section>
