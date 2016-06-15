<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $products = get_products();
    require("views/products.php");

  }elseif($action == "new"){
    $title = "New Product";

    $product = [];
    $product['id'] = "";
    $product['product_name'] = "";
    $product['price'] = "";
    $product['description'] = "";
    $product['sale'] = "";

    require("views/products-form.php");
  }elseif($action == "edit"){

    $id = (int)$_GET["id"];

    $title = "Edit Product";

    $product = get_product($id);

    require("views/products-form.php");
  }
}


 ?>
