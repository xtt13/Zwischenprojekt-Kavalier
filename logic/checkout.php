<?php

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
  $logged_in = true;
} else {
  $logged_in = false;
}

// $logged_in = true;
// $id = 1;

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
}


if($logged_in == false){

  //redirect_to("index.php?site=checkout&action=login-checkout");
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
