<?php
session_start();
include('views/header.php');

$site = isset($_GET['site']) ? $_GET["site"] : "homepage";



if($site == "store") {
  include("views/store.php");
} elseif($site == "homepage") {
  include("views/homepage.php");
} elseif($site == "bag") {
  include("views/bag.php");
} elseif($site == "detail") {
  include("views/detail.php");
} elseif($site == "login") {
  // Muss später noch auf $_SESSION überprüft werden!
  include("views/login.php");
} else {
  include("views/homepage.php");
}





















include('views/footer.php')
 ?>
