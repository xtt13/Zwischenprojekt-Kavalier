<?php

  // Query: Alle Kategorien
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //print_r($_POST);
  // print_r($_GET);



  // Wenn eine Kategorie gewählt wurde und keine Auswahl in der Sortierung getroffen wurde
  if(isset($_GET['category']) && isset($_POST) && empty($_POST)){
    $category = $_GET['category'];
    $products = category_product_query($category);

  // Wenn die Auswahl Price High-To-Low getroffen wurde
  } elseif(isset($_POST['sort-price']) && $_POST['sort-price'] == 'high-to-low'){

        // Wenn zusätzlich eine Kategorie gewählt wurde
        if(isset($_GET['category'])) {

          $category = $_GET['category'];
          $products = price_high_to_low_category($category);
          $high_to_low = "selected";
        } else {
          $products = price_high_to_low();
          $high_to_low = "selected";

        }

  // Wenn die Auswahl Price Low-To-High getroffen wurde
  } elseif(isset($_POST['sort-price']) && $_POST['sort-price'] == 'low-to-high'){

      // Wenn zusätzlich eine Kategorie gewählt wurde
      if(isset($_GET['category'])) {
        $category = $_GET['category'];
        $products = price_low_to_high_category($category);
        $low_to_high = "selected";

      } else {
        $products = price_low_to_high();
        $low_to_high = "selected";

      }
  } elseif(isset($_GET['action']) && $_GET['action'] == 'sale'){


      $products = all_sale_products_query();

  } else {
      $products = all_products_query();

  }

  $results = count($products);




 ?>
