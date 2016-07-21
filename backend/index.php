<?php
session_start();
date_default_timezone_set('Europe/Vienna');

include('functions/helpers.php');

if(!isset($_SESSION['is_admin']) || $_SESSION["is_admin"] !== true){
  redirect_to("../index.php?site=homepage");
  die();
}

include('../dbconnect.php');
include('functions/products.php');
include('functions/users.php');
include('functions/orders.php');
include('functions/search.php');
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
}elseif($site == "logout") {
  include("logic/logout.php");
}else{
  include("views/home.php");
}

include("views/footer.php")

?>
