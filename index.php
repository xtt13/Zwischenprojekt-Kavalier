<?php
session_start();
include('views/header.php');

$site = isset($_GET['site']) ? $_GET["site"] : "homepage";



if($site == "store") {
  include("views/store.php");
} elseif($site == "homepage") {
  include("views/homepage.php");
} else {
  include("views/homepage.php");
}





















include('views/footer.php')
 ?>
