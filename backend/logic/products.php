<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $products = get_products();
    require("views/products.php");

  }elseif($action == "new"){

    $title = "New Product";
    $form_action = "index.php?site=products&action=save_product";
    $submit_button_text = "Save";

    $product = [];
    $product['id'] = "";
    $product['product_name'] = "";
    $product['price'] = "";
    $product['description'] = "";
    $product['sale'] = "";
    $product['stock']= "";

    $categories = get_categories();

    require("views/products-form.php");
  }elseif($action == "save_product"){

    print_r($_FILES['name']);
    echo 'Hallo';

  }elseif($action == "edit"){

    $id = (int)$_GET["id"];

    $title = "Edit Product";
    $form_action ="index.php?site=products&action=save_edit";
    $submit_button_text = "Save";

    // $product = get_product($id);
    $product = get_category($id);
    $categories = get_categories();

    $other_images = $product['image_other'];
    $other_image = explode(', ', $other_images);
    print_r($other_image);

    require("views/products-form.php");
  }
}


 ?>
