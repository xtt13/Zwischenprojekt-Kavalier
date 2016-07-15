<?php

$id = $_SESSION['user_id'];
$user = get_user($id);
$errors = [];
$alternative_adress = false;
print_r($_POST);

if(isset($_POST['sbmbtn'])){

  $name = $_POST['name'];
  $street_and_number = $_POST['adress'];
  $zip = $_POST['zip'];
  $location = $_POST['location'];
  $country = $_POST['country'];





  // Wenn die Alternative Checkbox gechecked ist (ACHTUNG! Aufgrund des Checkboxstylings wird auf !isset überprüft !!!)
  if(!isset($_POST['alternative_checkbox'])){
    $alternative_adress = true;


    $alt_street_and_number = $_POST['alt_adress'];
    $alt_zip = $_POST['alt_zip'];
    $alt_location = $_POST['alt_location'];
    $alt_country = $_POST['alt_country'];


    if(empty($alt_street_and_number)) {
      $errors["alt_street_and_number"] = "We need your Alternative Invoiceadress!";
    }

    if(empty($alt_zip)) {
      $errors["alt_zip"] = "We need your Alternative ZIP!";
    }

    if(empty($alt_location)) {
      $errors["alt_location"] = "We need your Alternative Location!";
    }

    if(empty($alt_country)) {
      $errors["alt_country"] = "We need your Alternative Country!";
    }

  }

  if(empty($name)) {
    $errors["name"] = "We need your Name!";
  }

  if(empty($street_and_number)) {
    $errors["street_and_number"] = "We need your street and number!";
  }

  if(empty($zip)) {
    $errors["zip"] = "We need your ZIP!";
  }

  if(empty($location)) {
    $errors["location"] = "We need your location!";
  }

  if(empty($country)) {
    $errors["country"] = "We need a country!";
  }



  //print_r($errors);

  // Wenn keine Fehler vorhanden sind
  if(count($errors) === 0) {
      //save_reservation($fullname, $reservation_date, $smoking_area, $time_sent);

      // Wenn die Alternative Checkbox checked ist, dann verwende Besonderes Query
      if($alternative_adress == true){
        $sql = "UPDATE users SET fullname = '$name', street_and_number = '$street_and_number', zip = '$zip', location = '$location', country = '$country', alt_street_and_number = '$alt_street_and_number', alt_zip = '$alt_zip', alt_location = '$alt_location', alt_country ='$alt_country' WHERE id = '$id'";
        mysqli_query($link, $sql) or die(mysqli_error($link));
      } else {
        $sql = "UPDATE users SET fullname = '$name', street_and_number = '$street_and_number', zip = '$zip', location = '$location', country = '$country' WHERE id = '$id'";
        mysqli_query($link, $sql) or die(mysqli_error($link));
      }


      $account_information_success = true;

      // Wenn alles OK --> redirect zum nächsten Checkoutschritt
      // redirect_to("index.php?site=checkout&action=summary");
  }

}

// Nochmal Aktualisieren
$user = get_user($id);



 ?>
