<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $product = [];

    require("views/products.php");

  }elseif($action == "new"){

    require("views/products-form.php");
  }
}


 ?>
