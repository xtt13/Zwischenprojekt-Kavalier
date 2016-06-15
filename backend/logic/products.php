<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $products = get_products();
    require("views/products.php");

  }elseif($action == "new"){
    $title = "New Product";
    require("views/products-form.php");
  }elseif($action == "edit"){
    $title = "Edit Product";
    require("views/products-form.php");
  }
}


 ?>
