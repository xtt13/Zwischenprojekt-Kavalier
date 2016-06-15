<?php
session_start();
include('dbconnect.php');
include('views/header.php');
include('functions/products.php');
include('functions/users.php');

// include('functions/functions.php');

$site = isset($_GET['site']) ? $_GET["site"] : "index.php";
$action= $_GET['action'];


if($site == "statistics") {
    include("views/statistics.php");
} elseif($site == "orders") {
  include("views/orders.php");
} elseif($site == "users") {
  include("logic/users.php");
}elseif ($site == "products") {
  include("logic/products.php");
}
else{
  include("views/home.php");
}

//elseif($site == "detail") {
//   include("views/detail.php");
// } elseif($site == "checkout") {
//   include("logic/checkout.php");
// } elseif($site == "login") {
//   // Muss später noch auf $_SESSION überprüft werden!
//   include("logic/login.php");
// } else {
//   include("views/homepage.php");
// }
include("views/footer.php")

?>
