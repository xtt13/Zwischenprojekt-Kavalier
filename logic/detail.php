<?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

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

    //echo $error_message;
    //print_r($_SESSION['bag']);

 ?>
