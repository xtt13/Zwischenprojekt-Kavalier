<?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //print_r($products);

    // Kategorie des Detail Produkts
    $category_other = $products[0]['category'];

    // Query für "You might also like", MAX. 3 Datensätze, inkl. ZUFALL
    $sql = "SELECT * FROM products WHERE id != '$id' AND category = '$category_other' AND active = 1 ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $products_other = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Wenn es Alternative Produkte gibt gib die Section aus, sonst lasse sie weg!
    if(mysqli_num_rows($result) != 0){
      $at_least_one_product = true;
    }


    // Wenn $_GET['action']=="add-to-bag" gesetzt ist, dann schiebe Data in $_SESSION['bag']
    if(isset($_GET['action']) && $_GET['action'] == 'add-to-bag') {

      // Wenn der User keine Menge ausgewählt hat
      if($_POST['quantity'] == 0){
        $quantity_error = "Please choose a quantity!";
      } else {
        $productname = $_POST['product_name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        // Daten werden in den Bag geschrieben
        $_SESSION['bag'][$id]['quantity'] = $quantity;
        $_SESSION['bag'][$id]['id'] = $id;

        $quantity_success = "Product added to bag!";
      }

    }


 ?>
