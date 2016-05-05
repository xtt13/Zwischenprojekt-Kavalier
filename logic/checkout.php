<?php
// Überprüft ob man eingeloggt ist. Wenn nicht dann redirect zu Checkout Loginform
// if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true){
//   redirect_to("index.php?site=login&amp;action=checkout");
//   //die();
// }


if($_GET['site'] == 'checkout' && $_GET['action'] == 'shippinginformation'){
  include('views/shipping-information.php');
} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'summary') {
  include('views/summary.php');
} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'success') {
  include('views/thankyou.php');
} else {
  include('views/shipping-information.php');
}




?>
