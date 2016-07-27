<?php

// Überprüfen ob der User eingeloggt ist, und wenn ja wird Var auf true gesetzt
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
  $logged_in = true;
} else {
  $logged_in = false;
}

// User ID auslesen (Session['user_id'] wird während Login gesetzt)
if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
}

// Wenn der User nicht eingeloggt ist
if($logged_in == false){

  include('logic/login-checkout.php');

} else {

  if($_GET['site'] == 'checkout' && $_GET['action'] == 'shippinginformation'){

      include('logic/shipping-information.php');

  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'login-checkout') {

      include('logic/login-checkout.php');

  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'summary') {

      include('logic/summary-price-calculator.php');
      include('logic/summary.php');


  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'success') {

      include('logic/thankyou.php');

  } else {

      include('logic/thankyou.php');

  }

}
?>
