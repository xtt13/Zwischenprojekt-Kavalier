<?php
  if(!isset($_SESSION['registered']) || $_SESSION['registerd'] == false) {
    redirect_to('index.php?site=register');
  }
 ?>
  <div class="wrapper-page thankyou">

    <section class="thankyou-section">
      <h1>Thank You!</h1>
      <img src="images/success.svg" alt="Success!">
      <p>Your Registration was successful!</p>
      <a href="index.php?site=store">Home</a>
    </section>

  </div>
