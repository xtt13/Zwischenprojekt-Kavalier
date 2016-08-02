<?php


if(isset($_GET['action'])){

  $action = $_GET["action"];

  if($action == "view") {

    $products = get_products();
    require("views/products.php");

  }

  if($action == "new") {

    $categories = get_categories();

    require("views/products-form-new.php");
  }

  if($action == "save_new") {


    require("save_main_image.php");
    require("save_other_images.php");

    if(isset($_POST)){
      $productname = $_POST['product-name'];
      $productprice = $_POST['product-price'];
      $description = mysqli_real_escape_string($link, $_POST['product-description']);
      $category = $_POST['category'];
      $stock = $_POST['stock'];
      $mainimage = $filenames[0];
      $filenames_other = implode(', ', $filenames_other);




      if(isset($_POST['sale']) && $_POST['sale'] == 'on'){
        $sale = 1;
      } else {
        $sale = 0;
      }

      save_product($productname, $productprice, $sale, $stock, $description, $category, $mainimage, $filenames_other);

    }




    include("views/save-success.php");


  }if($action == "edit") {

        $id = (int)$_GET["id"];

        $title = "Edit Product";
        $form_action ="index.php?site=products&action=save_edit&id=$id";
        $submit_button_text = "Save";

        // $product = get_product($id);

        $product = get_category($id);
        $categories = get_categories();

        $other_images = $product['image_other'];
        $other_image = explode(', ', $other_images);

        require("views/products-form.php");

  }

  if($action == "save_edit") {

        $id = (int)$_GET["id"];

        $title = "Edit Product";
        $form_action ="index.php?site=products&action=save_edit&id=$id";
        $submit_button_text = "Save!";

        // $product = get_product($id);

        $product = get_category($id);
        $categories = get_categories();

        if(isset($_POST)){
          require("save_main_image.php");
          require("save_other_images.php");

          $productname = $_POST['product-name'];
          $productprice = $_POST['product-price'];
          $description = mysqli_real_escape_string($link, $_POST['product-description']);
          $category = $_POST['category'];
          $stock = $_POST['stock'];

          if(isset($filenames)){

            $mainimage = $filenames[0];
          } else {
            $mainimage = 'NoImage';
          }

          var_dump($mainimage);

          $filenames_other = implode(', ', $filenames_other);

          if(isset($_POST['sale']) && $_POST['sale'] == 'on'){
            $sale = 1;
          } else {
            $sale = 0;
          }


          if(empty($mainimage) && empty($filenames_other)){
            save_product_edit_noimages($id, $productname, $productprice, $sale, $stock, $description, $category);
            echo 'NO IMAGES';
          }
          if(!empty($mainimage) && empty($filenames_other)){
            save_product_edit_main($id, $productname, $productprice, $sale, $stock, $description, $category, $mainimage);
            echo 'MAIN IMAGE';
          }

          if(!empty($filenames_other) && empty($mainimage)){
            save_product_edit_other($id, $productname, $productprice, $sale, $stock, $description, $category, $filenames_other);
            echo 'OTHER IMAGE';
          }

          if(!empty($filenames_other) && !empty($mainimage)){
            save_product_edit_both($id, $productname, $productprice, $sale, $stock, $description, $category, $mainimage, $filenames_other);
            echo 'BOTH IMAGES';
          }

          $other_images = $product['image_other'];
          $other_image = explode(', ', $other_images);

          include("views/save-success.php");



        }


  }

  if($action == "delete") {

    $id = (int)$_GET["id"];
    delete_product($id);
    $products = get_products();
    require("views/products.php");

  }

}

 ?>
