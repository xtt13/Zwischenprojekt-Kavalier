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

    $categories = get_categories();

    require("views/products-form.php");
  }elseif($action == "edit"){

    $id = (int)$_GET["id"];

    $title = "Edit Product";

    // $product = get_product($id);
    $product = get_category($id);
    $categories = get_categories();

    require("views/products-form.php");
  }
}


 ?>
