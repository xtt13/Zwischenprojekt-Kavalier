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

  //redirect_to("index.php?site=checkout&action=login-checkout");
  include('views/login-checkout.php');

} else {

  if($_GET['site'] == 'checkout' && $_GET['action'] == 'shippinginformation'){

      include('views/shipping-information.php');

  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'login-checkout') {

      include('views/login-checkout.php');

  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'summary') {

      include('views/summary.php');

  } elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'success') {

      include('views/thankyou.php');

  } else {

      include('views/thankyou.php');

  }
}




?>
