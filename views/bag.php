<?php
  //Ansatz für das Löschen von Produkten aus dem Warenkorb

  if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
    // $key = array_search($_GET['id'], $_SESSION['bag']);
    $id = $_GET['id'];
    unset($_SESSION['bag'][$id]);
  }
 ?>




  <div class="wrapper-page bag">
    <h1 class="bag-headline">Your Bag</h1>

    <table class="bag-table">
      <thead class="bag-table-head">
        <tr>
          <th></th>
          <th>Productname</th>
          <th>Size</th>
          <th>Amount</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <tr class="space"></tr>

        <?php

        // Ansatz für Dedoding von Produkten im Cookie
        // $data = json_decode($_COOKIE['bag'], true);


        $gesamtpreis = "";
        if(isset($_SESSION['bag'])){
          $bag = $_SESSION['bag'];

          //print_r($bag);

          foreach($bag as $bag_keys){

            $product_id = $bag_keys['id'];


            $sql = "SELECT * FROM products WHERE id = '$product_id'";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // echo "<pre>";
            // print_r($_SESSION['bag']);
            // echo "</pre>";
            //print_r($products);


            $name = $products['0']['product_name'];
            $image = $products['0']['image_main'];
            $price = $products['0']['price'];
            $quantity = $bag_keys['quantity'];
            $id = $products['0']['id'];

            $entire_product_price = $price * $quantity;
            $gesamtpreis += $entire_product_price;

            echo "
                        <tr>
                          <td><div class='bag-table-image-wrapper'><img src='./images/$image' alt='Nailkit'></div></td>
                          <td>$name</td>
                          <td></td>
                          <td>$quantity</td>
                          <td>$entire_product_price €</td>
                          <td><a class='bag-delete' href='index.php?site=bag&action=delete&id=$id'></a></td>
                        </tr>

                        <tr class='space'></tr>
                ";
          }
        }




        ?>



      </tbody>
    </table>

    <div class="checkout-wrapper">
      <p>Total: <?php echo $gesamtpreis; ?>€</p>
      <a href="index.php?site=login&amp;action=checkout">Check out!</a>
    </div>

  </div>
