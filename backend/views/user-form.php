

  <div class="body-wrapper">

    <h3 class="headline"><?php echo $title ?></h3>

  <section class="form-new">
    <?php if(!isset($_SESSION['registered'])): ?>

    <form class="" action="<?php echo $form_action; ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <fieldset>

        <div class="form-wrapper">
          <h2 class="form-headline">Fullname</h2>
          <label for="fullname"></label>
          <input type="text" name="fullname" class="form-input" value="<?php echo $user['fullname']; ?>">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Age</h2>
          <label for="age"></label>
          <input type="number" name="age" class="form-input" value="<?php echo $user['age']; ?>">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Email</h2>
          <label for="email"></label>
          <input type="text" name="email" class="form-input" value="<?php echo $user['email']; ?>">
        </div>

        <?php if($action == 'new') :?>
        <div class="form-wrapper">
          <h2 class="form-headline">Password</h2>
          <label for="password"></label>
          <input type="password" name="password" class="form-input" value="">
        </div>
        <div class="form-wrapper">
          <h3 class="form-subheadline-diffrent">Confirm Password</h3>
          <label for="password-confirm"></label>
          <input type="password" name="password-confirm" class="form-input" value="">
        </div>
      <?php endif ?>

      <?php if($action == 'save_user') : ?>
      <div class="form-wrapper">
        <h2 class="form-headline">Password</h2>
        <label for="password"></label>
        <input type="password" name="password" class="form-input" value="">
      </div>
      <div class="form-wrapper">
        <h3 class="form-subheadline-diffrent">Confirm Password</h3>
        <label for="password-confirm"></label>
        <input type="password" name="password-confirm" class="form-input" value="">
      </div>
    <?php endif ?>


        <div class="form-wrapper">
              <h2 class="form-headline">Adress</h2>

                <div class="form-element-wrapper">

                  <div class="form-wrapper">
                  <h3 class="form-subheadline">Street and Number</h3>

                  <label for="street_and_number"></label>
                  <input type="text" name="street_and_number" class="input-street form-input" value="<?php echo $user['street_and_number']; ?>">
                </div>
              </div>

              <div class="form-element-wrapper">
                <div class="form-wraper">
                  <h3 class="form-subheadline">ZIP</h3>

                    <label for="zip"></label>
                    <input type="text" name="zip" class="input-zip form-input" value="<?php echo $user['zip']; ?>">
                </div>


                <div class="form-wrapper">
                  <h3 class="form-subheadline">Location</h3>

                  <label for="location"></label>
                  <input type="text" name="location" class="input-location form-input" value="<?php echo $user['location']; ?>">
                </div>

                <div class="form-wrapper">
                  <h3 class="form-subheadline">Country</h3>
                  <label for="country"></label>
                  <input type="text" name="country" class="input-country form-input" value="<?php echo $user['country']; ?>">
                </div>
              </div>
            </div>

            <div class="checkbox-wrapper">
              <label>
                <input type="checkbox" name="is_admin" <?php echo is_checked($user["is_admin"])?>> Administrator?
              </label>
            </div>

        <div class="form-wrapper">

          <button type="submit"  class="save-button" value="Save"><?php echo $submit_button_text?></button>
          <div class="error"><p><?php if(isset($error_message)){foreach ($error_message as $key) {echo "<li>$key</li>";}}?></p></div>

        </div>
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
