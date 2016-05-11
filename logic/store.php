<?php
  // // Query: Alle Produkte aus der Tabelle welche aktiv sind
  // $sql = "SELECT * FROM products WHERE active = 1";
  // $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  //
  // $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Query: Alle Kategorien
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Wenn im GET['category'] nichts drinn steht, dann rufe die Funktion all_products_query() auf, sonst category_product_query($category)
  if(!isset($_GET['category']) && !isset($_POST)){
      $products = all_products_query();

  } elseif(isset($_GET['category'])) {
      $category = $_GET['category'];
      $products = category_product_query($category);
  } elseif(isset($_POST['sort-price']) && $_POST['sort-price'] == 'high-to-low'){
      $products = price_high_to_low();
      $high_to_low = "selected";
  } elseif(isset($_POST['sort-price']) && $_POST['sort-price'] == 'low-to-high'){
      $products = price_low_to_high();
      $low_to_high = "selected";
  } else {
      $products = all_products_query();
  }

  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";



 ?>
