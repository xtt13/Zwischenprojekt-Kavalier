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
} elseif($site == "store") {
  include("logic/store.php");
}

// AB HIER VIEWS EINBINDUNGEN

include('views/header.php');

if($site == "store") {
  include("views/store.php");
} elseif($site == "homepage") {
  include("views/homepage.php");
} elseif($site == "bag") {
  include("views/bag.php");
} elseif($site == "detail") {
  include("views/detail.php");
} elseif($site == "checkout") {
  include("views/checkout.php");
} elseif($site == "login") {
  // Muss später noch auf $_SESSION überprüft werden!
  include("logic/login.php");
} else {
  include("views/homepage.php");
}

include('views/footer.php')

 ?>
