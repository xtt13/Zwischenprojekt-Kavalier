<?php

  //PAGINATION (nur für All Produkts), für alle Anderen bin ich zu faul bzw. hab keine Zeit und ist zu viel Arbeit!

  if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
    if($page > 1){
      $nextpage = $page + 1;
      $prevpage = $page - 1;
    }
    if($page == 1){
      $nextpage = $page + 1;
      $prevpage = $page - 1;
    }
  } else {
    $page = 1;
    $nextpage = $page + 1;
    $prevpage = 1;
  }

  if(isset($_GET['per-page'])){
    $perPage = (int)$_GET['per-page'];
  } else {
    $perPage = 12;
  }

  // Ermittelt Startpunkt für Pagination
  $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


  // Query: Alle Kategorien
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);



  // Wenn eine Kategorie gewählt wurde und keine Auswahl in der Sortierung getroffen wurde
  if(isset($_GET['category']) && !isset($_GET['sort-price'])){
    $category = $_GET['category'];
    $products = category_product_query($category);

  // Wenn die Auswahl Price High-To-Low getroffen wurde
} elseif(isset($_GET['sort-price']) && $_GET['sort-price'] == 'high-to-low'){

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
} elseif(isset($_GET['sort-price']) && $_GET['sort-price'] == 'low-to-high'){

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
      $products = all_products_query($start,$perPage);

  }

  // Ermittelt die Anzahl der aktuell Angezeigten Produkte
  $results = count($products);

  // Ermittelt die Anzahl aller aktiven Produkte
  $total = count_all_products();

  // Ermittelt die Anzahl der Seiten
  $pages = ceil($total / $perPage);





 ?>
