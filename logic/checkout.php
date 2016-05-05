<?php
// Überprüft ob man eingeloggt ist. Wenn nicht dann redirect zu Checkout Loginform
// if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true){
//   redirect_to("index.php?site=login&amp;action=checkout");
//   //die();
// }


// wird mit $_SESSION['logged_in'] und der $_SESSION['id'] ersetzt
$logged_in = true;
$id = 1;

// Überprüfung auf Richtige GET Parameter des Checkouts + $logged_in Überprüfung
if($_GET['site'] == 'checkout' && $_GET['action'] == 'shippinginformation'){
  if($logged_in == false){
    redirect_to("index.php?site=login&amp;action=checkout");
  } else {
    include('views/shipping-information.php');
  }
} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'summary') {
  if($logged_in == false){
    redirect_to("index.php?site=login&amp;action=checkout");
  } else {
    include('views/summary.php');
  }
} elseif($_GET['site'] == 'checkout' && $_GET['action'] == 'success') {
  if($logged_in == false){
    redirect_to("index.php?site=login&amp;action=checkout");
  } else {
    include('views/thankyou.php');
  }
} else {
  if($logged_in == false){
    redirect_to("index.php?site=login&amp;action=checkout");
  } else {
    include('views/thankyou.php');
  }
}




?>
