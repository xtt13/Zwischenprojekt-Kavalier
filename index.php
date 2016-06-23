<?php
session_start();
include('dbconnect.php');
include('functions/functions.php');

// GET ÜBERPRÜFUNG
$site = isset($_GET['site']) ? $_GET["site"] : "homepage";


// LOGIC EINBINDUNGEN
if($site == "checkout"){
  include("logic/checkout.php");
} elseif($site == "detail") {
  include("logic/detail.php");
} elseif($site == "logout") {
  include("logic/logout.php");
} elseif($site == "login") {
  include("logic/login-default.php");
} elseif($site == "account") {
  include("logic/account.php");
} elseif($site == "register") {
  include("logic/register.php");
} elseif($site == "store") {
  include("logic/store.php");
}

// AB HIER VIEWS EINBINDUNGEN

include('views/header.php');

if($site == "store") {
  include("views/store.php");
} elseif($site == "homepage") {
  include("views/homepage.php");
} elseif($site == "account") {
  include("views/account.php");
} elseif($site == "bag") {
  include("views/bag.php");
} elseif($site == "detail") {
  include("views/detail.php");
} elseif($site == "checkout") {
  include("views/checkout.php");
} elseif($site == "login") {
  include("views/login-default.php");
} elseif($site == "register") {
  include("views/register.php");
} elseif($site == "registersuccess") {
  include("views/success-register.php");
} else {
  include("views/homepage.php");
}

include('views/footer.php')

 ?>
