
  <div class="wrapper-page login">

    <section class="login-form">
      <form action="#" method="post">
        <fieldset>
          <h3 class="login-form">Login</h3>
            <label for="email"></label>
            <input class="login-email"type="text" name="email" placeholder="Emailadress"><br>
            <label for="password"></label>
            <input class="login-password" type="password" name="password" placeholder="Password">

            <?php if(isset($errors) && $error == 1) { foreach ($errors as $error){ echo "<p class='login-error'>" . $error . "</p>";}}?>

            <input class="login-submit" type="submit" value="Login">
        </fieldset>
        <ul class="support">
          <li><a href="index.php?site=pwdreset">Forgot your password?</a></li>
          <li><a href="index.php?site=register">No account? Sign up Now!</a></li>
        </ul>
      </form>

    </section>

  </div>
