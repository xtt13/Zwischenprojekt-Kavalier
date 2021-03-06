
  <div class="wrapper-page login">

    <img class="progress_bar" src="images/progressbar.svg" border="0" width="528" height="48" orgWidth="528" orgHeight="48" usemap="#image-maps-2016-03-26-060856" alt="" />
    <map name="image-maps-2016-03-26-060856" id="ImageMapsCom-image-maps-2016-03-26-060856">
    <area  alt="Login" title="Login" href="index.php?site=login-checkout&amp;action=checkout" shape="rect" coords="0,0,48,48" style="outline:none;" target="_self"     />
    <area  alt="Shippinginformation" title="Shippinginformation" href="index.php?site=checkout&amp;action=shippinginformation" shape="rect" coords="161,0,208,48" style="outline:none;" target="_self"     />
    <area  alt="Summary" title="Summary" href="index.php?site=checkout&amp;action=summary" shape="rect" coords="320,0,367,48" style="outline:none;" target="_self"     />
    <area  alt="Thank You!" title="Thank You!" href="index.php?site=checkout&amp;action=success" shape="rect" coords="481,0,528,48" style="outline:none;" target="_self"     />
    <area shape="rect" coords="526,46,528,48" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
    </map>

    <section class="progressbar_text">
      <ul>
        <li>Login</li>
        <li>Shipping</li>
        <li>Summary</li>
        <li>Success</li>
      </ul>
    </section>

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
