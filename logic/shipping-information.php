<?php
    if(empty($_SESSION['bag'])){
      redirect_to("index.php?site=bag");
    }

    $_SESSION['shippinginformation'] = false;

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
    $_SESSION['alternative_adress'] = false;

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
        $_SESSION['alternative_adress'] = true;

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
          if($_SESSION['alternative_adress'] == true){
            $sql = "UPDATE users SET street_and_number = '$street_and_number', zip_and_location = '$zip_and_location', country = '$country', alt_street_and_number = '$alt_street_and_number', alt_zip_and_location = '$alt_zip_and_location', alt_country ='$alt_country', payment = '$payment' WHERE id = '1'";
            mysqli_query($link, $sql) or die(mysqli_error($link));
          } else {
            $sql = "UPDATE users SET street_and_number = '$street_and_number', zip_and_location = '$zip_and_location', country = '$country', payment = '$payment' WHERE id = '1'";
            mysqli_query($link, $sql) or die(mysqli_error($link));
          }

          // Alles in Shippinginformation ist OK. (Ist  Berechtigung für nächsten Checkoutteil)
          $_SESSION['shippinginformation'] = true;

          // Wenn alles OK --> redirect zum nächsten Checkoutschritt
          redirect_to("index.php?site=checkout&action=summary");
      }

    }

    print_r($errors);

?>