<?php
  if($_SESSION['summary'] !== true && $_SESSION['shippinginformation'] !== true){
    redirect_to("index.php?site=checkout&action=summary");
  }

 ?>
  <div class="wrapper-page thankyou">

    <img class="progress_bar" src="images/progressbar4.svg" border="0" width="528" height="48" orgWidth="528" orgHeight="48" usemap="#image-maps-2016-03-26-060856" alt="" />
    <map name="image-maps-2016-03-26-060856" id="ImageMapsCom-image-maps-2016-03-26-060856">
    <area  alt="Login" title="Login" href="index.php?site=login&amp;action=checkout" shape="rect" coords="0,0,48,48" style="outline:none;" target="_self"     />
    <area  alt="Shippinginformation" title="Shipping Information" href="index.php?site=checkout&amp;action=shippinginformation" shape="rect" coords="161,0,208,48" style="outline:none;" target="_self"     />
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

    <section class="thankyou-section">
      <h1>Thank You!</h1>
      <img src="images/success.svg" alt="Success!">
      <p>Your order was a success!</p>
      <a href="index.php?site=store">Home</a>
    </section>

  </div>
