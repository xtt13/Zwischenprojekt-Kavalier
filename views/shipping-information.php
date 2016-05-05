  <?php

    // Query: Alle Produkte aus der Tabelle welche aktiv sind
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($user);
    // print_r($_POST);

    $errors = [];
    $prepayment_checked = '';
    $oninvoice_checked = '';
    $lastname_checked = '';

    $payment = $user[0]['payment'];

    // Hinterlegte Zahlungsart wird überprüft und die richtige Checkbox gecheckt
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

    // Wenn der Submitbutton gesetzt ist
    if(isset($_POST['button-sbm'])){

      $street_and_number = $_POST['adress'];
      $zip_and_location = $_POST['zip'];
      $payment = $_POST['payment'];
      $country = $_POST['country'];

      // Wenn die Alternative Checkbox gechecked ist (ACHTUNG! Aufgrund des Checkboxstylings wird auf !isset überprüft !!!)
      if(!isset($_POST['alternative_checkbox'])){
        $alternative_adress = true;

        $alt_street_and_number = $_POST['alt-adress'];
        $alt_zip_and_location = $_POST['alt_zip'];
        $alt_country = $_POST['alt_country'];

        if(empty($alt_street_and_number)) {
          $errors["alt_street_and_number"] = "We need your Alternative Invoiceadress!";
        }

        if(empty($alt_zip_and_location)) {
          $errors["alt_zip_and_location"] = "We need your Alternative ZIP!";
        }

        if(empty($alt_country)) {
          $errors["alt_country"] = "We need your Alternative Country!";
        }

      }

      if(empty($street_and_number)) {
        $errors["street_and_number"] = "We need your street and number!";
      }

      if(empty($zip_and_location)) {
        $errors["zip_and_location"] = "We need your street and number!";
      }

      if(empty($payment)) {
        $errors["payment"] = "We need a payment!";
      }

      if(empty($country)) {
        $errors["country"] = "We need a country!";
      }


      // Wenn keine Fehler vorhanden sind
      if(count($errors) === 0) {
          //save_reservation($fullname, $reservation_date, $smoking_area, $time_sent);

          // Wenn die Alternative Checkbox checked ist, dann verwende Besonderes Query
          if($alternative_adress == true){
            $sql = "UPDATE users SET street_and_number = '$street_and_number', zip_and_location = '$zip_and_location', country = '$country', alt_street_and_number = '$alt_street_and_number', alt_zip_and_location = '$alt_zip_and_location', alt_country ='$alt_country', payment = '$payment' WHERE id = '1'";
            mysqli_query($link, $sql) or die(mysqli_error($link));
          } else {
            $sql = "UPDATE users SET street_and_number = '$street_and_number', zip_and_location = '$zip_and_location', country = '$country', payment = '$payment' WHERE id = '1'";
            mysqli_query($link, $sql) or die(mysqli_error($link));
          }

          // Alles in Shippinginformation ist OK
          $_SESSION['shippinginformation'] = true;

          // Wenn alles OK --> redirect zum nächsten Checkoutschritt
          redirect_to("index.php?site=checkout&action=summary");
      }

    }

    print_r($errors);


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
            <input class="shipping-alternative" id="shipping-alternative" value="alt_shipping_adress" type="checkbox" name="alternative_checkbox" checked>
            <label class="shipping-alternative-label" for="shipping-alternative"><span></span>Alternative Invoiceadress</label>
          </div>


          <input class="invoice-adress" type="text" name="alt-adress" value="<?php echo $user[0]['alt_street_and_number']; ?>" placeholder="Street and Number" disabled><br>

          <div class="short">
            <input class="invoice-zip" type="text" name="alt_zip" value="<?php echo $user[0]['alt_zip_and_location']; ?>" placeholder="Zip" disabled><br>
            <input class="invoice-country" type="text" name="alt_country" value="<?php echo $user[0]['alt_country']; ?>" placeholder="Country" disabled><br>
          </div>

          <h3 class="shipping-form">Payment</h3>

          <div class="checkboxes-wrapper">
            <div class="on-invoice-wrapper">
              <input class="on-invoice" id="on-invoice-label" name="payment" value="oninvoice" type="radio" <?php echo $oninvoice_checked; ?>>
              <label class="on-invoice-label" for="on-invoice-label"><span></span>On Invoice</label>
            </div>

            <div class="lastname-wrapper">
              <input class="lastname" id="lastname-label" name="payment" value="lastname" type="radio" <?php echo $lastname_checked; ?>>
              <label class="lastname-label" for="lastname-label"><span></span>Lastname</label>
            </div>

            <div class="prepayment-wrapper">
              <input class="prepayment" id="prepayment-label"  value="prepayment" name="payment" type="radio" <?php echo $prepayment_checked; ?>>
              <label class="prepayment-label" for="prepayment-label"><span></span>Prepayment</label>
            </div>
          </div>

          <button class="shipping-submit" name="button-sbm" type="submit" value="Next">Next!</button>
        </fieldset>
      </form>
    </section>

  </div>
