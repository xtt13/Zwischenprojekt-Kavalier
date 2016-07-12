<?php
session_start();

if(!isset($_SESSION['is_admin']) || $_SESSION["is_admin"] !== true){
  redirect_to("../index.php?site=homepage");
  die();
}

include('dbconnect.php');
include('functions/products.php');
include('functions/users.php');
include('functions/orders.php');
include('functions/search.php');
include('functions/helpers.php');
include("logic/messages.php");
include('views/header.php');
// include('functions/functions.php');

$site = isset($_GET['site']) ? $_GET["site"] : "index.php";
//$action= $_GET['action'];


if($site == "statistics") {
    include("logic/charts.php");
} elseif($site == "orders") {
  include("logic/orders.php");
} elseif($site == "search") {
  include("logic/search.php");
  include("views/search.php");
} elseif($site == "users") {
  include("logic/users.php");
} elseif($site == "messages") {
  include("views/messages.php");
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
