<?php
// Überprüft ob man eingeloggt ist. Wenn nicht dann redirect zu Checkout Loginform


// wird mit $_SESSION['logged_in'] und der $_SESSION['id'] ersetzt
//$logged_in = true;
$id = 1;
$_SESSION['user_id'] = 1;
$logged_in = true;

// Überprüfung auf Richtige GET Parameter des Checkouts + $logged_in Überprüfung
if($_GET['site'] == 'checkout' && $_GET['action'] == 'shippinginformation'){
  if($logged_in == false){
    redirect_to("index.php?site=checkout&action=login-checkout");
  } else {
    include('logic/shipping-information.php');
  }

} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'login-checkout') {
  if($logged_in == false){
    redirect_to("index.php?site=checkout&action=login-checkout");
  } else {
    include('logic/login-checkout.php');
  }

} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'summary') {
  if($logged_in == false){
    redirect_to("index.php?site=checkout&action=login-checkout");
  } else {
    include('logic/summary-price-calculator.php');
    include('logic/summary.php');
  }

} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'success') {
  if($logged_in == false){
    redirect_to("index.php?site=checkout&action=login-checkout");
  } else {
    include('logic/thankyou.php');
  }


} else {
  if($logged_in == false){
    redirect_to("index.php?site=checkout&action=login-checkout");
  } else {
    include('logic/thankyou.php');
  }
}
?>
