  <?php

    // Query: Alle Produkte aus der Tabelle welche aktiv sind
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($user);

    $payment = $user[0]['payment'];

    $prepayment_checked = '';
    $oninvoice_checked = '';
    $lastname_checked = '';

    switch ($payment) {
        case 'prepayment':
            $prepayment_checked = 'checked';
            break;
        case 'oninvoice':
            $oninvoice_checked = 'checked';
            break;
        case 'lastname':
            $lastname_checked = 'checked';
            break;

        default:
    }

   ?>


  <div class="wrapper-page shipping">

    <img class="progress_bar" src="images/progressbar2.svg" border="0" width="528" height="48" orgWidth="528" orgHeight="48" usemap="#image-maps-2016-03-26-060856" alt="Progressbar" />
    <map name="image-maps-2016-03-26-060856" id="ImageMapsCom-image-maps-2016-03-26-060856">
    <area  alt="Login" title="Login" href="index.php?site=login&amp;action=checkout" shape="rect" coords="0,0,48,48" style="outline:none;" target="_self"     />
    <area  alt="Shipping Information" title="" href="index.php?site=checkout&amp;action=shippinginformation" shape="rect" coords="161,0,208,48" style="outline:none;" target="_self"     />
    <area  alt="Summary" title="" href="index.php?site=checkout&amp;action=summary" shape="rect" coords="320,0,367,48" style="outline:none;" target="_self"     />
    <area  alt="Thank You!" title="" href="index.php?site=checkout&amp;action=success" shape="rect" coords="481,0,528,48" style="outline:none;" target="_self"     />
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

    <section class="shipping-form">
      <form action="#" method="post">
        <fieldset>
          <h3 class="shipping-form">Shippingadress</h3>
          <input class="shipping-adress" type="text" name="adress" value="<?php echo $user[0]['street_and_number']; ?>" placeholder="Street and Number"><br>

          <div class="short">
            <input class="shipping-zip" type="text" name="zip" value="<?php echo $user[0]['zip_and_location']; ?>" placeholder="Zip"><br>
            <input class="shipping-country" type="text" name="country" value="<?php echo $user[0]['country']; ?>" placeholder="Country"><br>
          </div>

          <div class="shipping-alternative-wrapper">
            <input class="shipping-alternative" id="shipping-alternative" type="checkbox" name="alternative" checked>
            <label class="shipping-alternative-label" for="shipping-alternative"><span></span>Alternative Invoiceadress</label>
          </div>


          <input class="invoice-adress" type="text" name="alt-adress" placeholder="Street and Number" disabled><br>

          <div class="short">
            <input class="invoice-zip" type="text" name="zip" placeholder="Zip" disabled><br>
            <input class="invoice-country" type="text" name="country" placeholder="Country" disabled><br>
          </div>

          <h3 class="shipping-form">Payment</h3>

          <div class="checkboxes-wrapper">
            <div class="on-invoice-wrapper">
              <input class="on-invoice" id="on-invoice-label" name="oninvoice" type="radio" <?php echo $oninvoice_checked; ?>>
              <label class="on-invoice-label" for="on-invoice-label"><span></span>On Invoice</label>
            </div>

            <div class="lastname-wrapper">
              <input class="lastname" id="lastname-label" name="lastname" type="radio" <?php echo $lastname_checked; ?>>
              <label class="lastname-label" for="lastname-label"><span></span>Lastname</label>
            </div>

            <div class="prepayment-wrapper">
              <input class="prepayment" id="prepayment-label" name="prepayment" type="radio" <?php echo $prepayment_checked; ?>>
              <label class="prepayment-label" for="prepayment-label"><span></span>Prepayment</label>
            </div>
          </div>

          <input class="shipping-submit" type="submit" value="Next">
        </fieldset>
      </form>
    </section>

  </div>
