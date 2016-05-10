<?php

  if($_SESSION['shippinginformation'] !== true){
    redirect_to("index.php?site=checkout&action=shippinginformation");
  }

  //Damit man in der Menüwahl bei einer späteren Bestellung nicht auf die (3)Summary springen kann. Damit Daten submited werden und nicht übersprungen werden können
  //$_SESSION['shippinginformation'] = false;

  // Query von Userdaten
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));
  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //print_r($_POST);


  // Wenn der Buy!-Button gedrückt wurde
  if(isset($_POST['button-sbm-buy'])){

    $created_at = time();
    $user_id = $user[0]['id'];

    //echo $gesamtpreis;

    // Die Bestellung wird in 'orders' eingetragen
    $sql = "INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$gesamtpreis')";
    mysqli_query($link, $sql) or die(mysqli_error($link));
    // ID vom letzen Query wird ausgelesen
    $order_id = mysqli_insert_id($link);

    $bag = $_SESSION['bag'];

    // Bag wird nochmal durchlaufen und der jeweilige Preis des Produkts wird erfasst
    foreach($bag as $bag_keys){

      $product_id = $bag_keys['id'];

      // Query für Produkt
      $sql = "SELECT * FROM products WHERE id = '$product_id'";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));
      $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

      $quantity = $bag_keys['quantity'];
      $price = $products['0']['price'];

      // Einzelnen Produkte werden in 'producs_sold' geschrieben. Mit der order_id kann jede Bestellung wieder zusammengebaut werden.
      $sql = "INSERT INTO products_sold (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    }
    //Der Abschnitt Summary ist OK (Ist  Berechtigung für nächsten Checkoutteil)
    $_SESSION['summary'] = true;

    // SESSION Überprüfung für Checkoutbereich wird zurückgesetzt
    //$_SESSION['shippinginformation'] = false;

    // Warenkorb wird geleert
    unset($_SESSION['bag']);

    // Redirect zur Successseite
    redirect_to("index.php?site=checkout&action=success");
    echo "TEST";
  }

 ?>
