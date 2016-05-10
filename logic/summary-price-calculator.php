<?php
  // Wenn sich etwas im Warenkorb befindet
  if(isset($_SESSION['bag'])){
    $bag = $_SESSION['bag'];

    //print_r($bag);
    $gesamtpreis = 0;

    // Foreachschleife für WarenkorbArray
    foreach($bag as $bag_keys){

      //Produkt ID auf Variable
      $product_id = $bag_keys['id'];

      // Query für Produkt
      $sql = "SELECT * FROM products WHERE id = '$product_id'";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));
      $products = mysqli_fetch_all($result, MYSQLI_ASSOC);


      $name = $products['0']['product_name'];
      $image = $products['0']['image_main'];
      $price = $products['0']['price'];
      $quantity = $bag_keys['quantity'];
      $id = $products['0']['id'];

      // Entirepreis = Produktpreis * Menge
      $entire_product_price = $price * $quantity;
      $gesamtpreis += $entire_product_price;

    }

    // Wenn der Gesamtpreis <= 30€ ist, dann berechne 4,99€ Versand
    if($gesamtpreis <= 30){
      $gesamtpreis += 4.99;
      // Wenn der Gesamtpreis > 30€ ist, dann berechne 0€ Versand
    }
  }
 ?>
