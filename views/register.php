
  <div class="wrapper-page registration">

<?php if(!isset($registered)): ?>

    <section class="register-form">
      <form action="index.php?site=register" method='post'>
        <fieldset>
          <h3 class="register-form">Registration</h3>

            <input class="register-name" type="text" name="name" placeholder="Name"><br>

            <input class="register-age" type="text" name="age" placeholder="Age"><br>

            <input class="register-email" type="email" name="email" placeholder="Emailadress"><br>

            <input class="register-password" type="password" name="password" placeholder="Password"><br>

            <input class="register-password-again" type="password" name="password-again" placeholder="Password again"><br>

            <input class="register-adress" type="text" name="streetandnumber" placeholder="Street and Number"><br>

            <div class="short">

            <input class="register-zip" type="text" name="zip" placeholder="ZIP"><br>

            <input class="register-location" type="text" name="location" placeholder="Location"><br>
            </div>

            <input class="register-country" type="text" name="country" placeholder="Country"><br>

            <input name='sbmbtn' class="register-submit" type="submit" value="Register">
            <div class="registration-error"><p><?php if(isset($error_message)){foreach ($error_message as $key) {echo $key;}} ?></p></div>
        </fieldset>
      </form>

    </section>

  <?php else: ?>

    <section class="thankyou-section">
      <h1>Registered!</h1>
      <img src="images/success.svg" alt="Success!">

      <a href="index.php?site=store">Home</a>
    </section>


  <?php endif; ?>

  </div>
