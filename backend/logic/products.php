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
      $description = $_POST['product-description'];
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

    //     echo '<pre>';
    //     print_r($_FILES);
    //     echo '</pre>';
    //
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

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
        $submit_button_text = "Save";

        // $product = get_product($id);

        $product = get_category($id);
        $categories = get_categories();

        if(isset($_POST)){
          require("save_main_image.php");
          require("save_other_images.php");

          $productname = $_POST['product-name'];
          $productprice = $_POST['product-price'];
          $description = $_POST['product-description'];
          $category = $_POST['category'];
          $stock = $_POST['stock'];

          if(isset($filenames)){

            $mainimage = $filenames[0];
          } else {
            $mainimage = 'bla';
          }

          var_dump($mainimage);

          // foreach($filenames as $file){
          //   $mainimage = $file;
          // }

          // echo '<pre>';
          // print_r($filenames);
          // echo '</pre>';
          //
          // echo '<pre>';
          // print_r($filenames_other);
          // echo '</pre>';

          $filenames_other = implode(', ', $filenames_other);

          if(isset($_POST['sale']) && $_POST['sale'] == 'on'){
            $sale = 1;
          } else {
            $sale = 0;
          }

          // print_r($filenames);
          // print_r($filenames_other);

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


        // $other_images = $product['image_other'];
        // $other_image = explode(', ', $other_images);

        //require("views/products-form.php");

  }

  if($action == "delete") {

    $id = (int)$_GET["id"];
    delete_product($id);
    $products = get_products();
    require("views/products.php");

  }

}



















// if(isset($_GET['action'])) {
//
//   $action = $_GET["action"];
//
//   if($action == "view") {
//
//     $products = get_products();
//     require("views/products.php");
//
//   }elseif($action == "new"){
//
//     $title = "New Product";
//     $form_action = "index.php?site=products&action=save_product";
//     $submit_button_text = "Save";
//
//     $product = [];
//     $product['id'] = "";
//     $product['product_name'] = "";
//     $product['price'] = "";
//     $product['description'] = "";
//     $product['sale'] = "";
//     $product['stock']= "";
//
//     $categories = get_categories();
//
//     require("views/products-form.php");
//   }elseif($action == "save_product"){
//
//     print_r($_FILES['name']);
//     echo 'Hallo';
//
//   }elseif($action == "edit"){
//
//     $id = (int)$_GET["id"];
//
//     $title = "Edit Product";
//     $form_action ="index.php?site=products&action=save_edit&id=$id";
//     $submit_button_text = "Save";
//
//     // $product = get_product($id);
//     $product = get_category($id);
//     $categories = get_categories();
//
//     $other_images = $product['image_other'];
//     $other_image = explode(', ', $other_images);
//     print_r($other_image);
//
//     require("views/products-form.php");
//
//   }elseif($action == "save_edit"){
//
//     echo '<pre>';
//     print_r($_FILES);
//     echo '</pre>';
//
//     echo '<pre>';
//     print_r($_POST);
//     echo '</pre>';
//
//     define("MAX_FILE_SIZE", 10485760);
//     ini_set("upload_max_filesize", "10M"); // ändert Wert aus php.ini (nur für dieses script)
//     $filenames = [];
//
//     $errors = array();
//     $allowed_file_types = array("image/jpeg", "image/gif", "image/png");
//     $upload_errors = array(
//         0 => 'There is no error, the file uploaded with success',
//         1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
//         2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
//         3 => 'The uploaded file was only partially uploaded',
//         4 => 'No file was uploaded',
//         6 => 'Missing a temporary folder',
//         7 => 'Failed to write file to disk.',
//         8 => 'A PHP extension stopped the file upload.',
//     );
//
//     echo 'HALLO';
//
//
//     foreach ($_FILES['image']['name'] as $index => $filename) {
//
//           echo 'HALLO_2';
//
//       // dateiname + tmp-name in variablen speichern
//       $original_name = $_FILES['image']['name'][$index];
//       $tmp_file = $_FILES['image']['tmp_name'][$index];
//
//       // prüft ob beim hochladen ein fehler stattgefunden hat
//       if($_FILES['image']['error'][$index] != 0) {
//         $errors[$index][] = $upload_errors[$_FILES['image']['error'][$index]];
//           print_r($errors);
//       } else {
//
//           echo 'HALLO_3';
//
//         // prüft ob mime-type im $allowed_file_types array ist, wenn nicht wird error hinzugefügt
//         if(!in_array($_FILES['image']['type'][$index], $allowed_file_types)) {
//           $errors[$index][] = "Dateityp muss jpeg, gif oder png sein.";
//         }
//
//         // 1048576 = 1mb; prüft ob datei kleiner als 1mb ist, wenn nicht wird error hinzugefügt
//         if($_FILES['image']['size'][$index] > MAX_FILE_SIZE) {
//           $errors[$index][] = "Datei darf nicht größer als 1 MB sein.";
//         }
//
//         print_r($errors);
//
//         // wenn für die aktuelle datei keine fehler gesetzt sind bzw. stattgefunden haben
//         if(empty($errors[$index])) {
//
//           echo 'HIER DRINN';
//
//           // ersetzt alle zeichen außer a-z 0-9 - und _ mit einem leerstring ("")
//           // für umlaute: php.net http://php.net/manual/de/function.preg-replace.php
//           $original_name = preg_replace('/[^a-z0-9.\-_]/i', "", $original_name);
//
//           // verschiebt datei aus dem tmp-verzeichnis in unser gewünschtes verzeichnis (uploads/)
//           if(move_uploaded_file($tmp_file, "../images/$original_name")) {
//
//             array_push($filenames, $original_name);
//
//             $success_message = "Upload hat geklappt";
//             echo $success_message;
//           } else {
//             $error_message = "Upload hat nicht geklappt";
//             echo $error_message;
//           }
//         }
//       }
//     }
//       //
//       //
//       // $id = (int)$_GET["id"];
//       //
//       // $title = "Edit Product";
//       // $form_action ="index.php?site=products&action=save_edit&id=$id";
//       // $submit_button_text = "Save";
//       //
//       // // $product = get_product($id);
//       // $product = get_category($id);
//       // $categories = get_categories();
//       //
//       // $other_images = $product['image_other'];
//       // $other_image = explode(', ', $other_images);
//       //
//       // require("views/products-form.php");
//
//       }
//     }
//

 ?>
