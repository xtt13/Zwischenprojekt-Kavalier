<?php

  //Löschen von Produkten aus dem Warenkorb
  if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){

    $id = $_GET['id'];
    unset($_SESSION['bag'][$id]);
  }

  if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'update_cart' && isset($_GET['quantity'])){
      $quantity = $_GET['quantity'];
      $id = $_GET['id'];

      //Überprüfung ob gewählte Produktanzahl nicht größer als Anzahl im Stock ist
      $result = get_product($id);
      $stock_update = $result[0]['stock'];

      if($quantity <= $stock_update){
        $_SESSION['bag'][$id]['quantity'] = $quantity;
      }
  }
 ?>
  <div class="wrapper-page bag">
    <h1 class="bag-headline">Your Bag</h1>

    <form action='index.php?site=bag' method='post'>
    <table class="bag-table">
      <thead class="bag-table-head">
        <tr>
          <th></th>
          <th>Productname</th>
          <th>Amount</th>
          <th>Price</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <tr class="space"></tr>

        <?php

        $gesamtpreis = "";

        // Wenn sich etwas im Warenkorb befindet
        if(isset($_SESSION['bag']) && !empty($_SESSION['bag'])){
          $bag = $_SESSION['bag'];

          foreach($bag as $bag_keys){

            // Warenkorb ID auf Variable legen
            $product_id = $bag_keys['id'];

            // Datenbankabfrage der Produkte
            $sql = "SELECT * FROM products WHERE id = '$product_id'";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Datenbank Array Values auf Variablen legen.
            $name = $products['0']['product_name'];
            $image = $products['0']['image_main'];
            $price = $products['0']['price'];
            $quantity = $bag_keys['quantity'];
            $id = $products['0']['id'];

            // Preisberechnung
            $entire_product_price = $price * $quantity;
            $gesamtpreis += $entire_product_price;

            echo "
                        <tr>
                          <td><div class='bag-table-image-wrapper'><a class='bag-table-image-link' href='index.php?site=detail&id=$id'><img src='./images/$image' alt='Bild'></a></div></td>
                          <td>$name</td>
                          <td><select class='bag-select' name='$id'>
                ";
                          for($i=1;$i<=$products['0']['stock'];$i++){
                            if($i == $quantity){
                              echo "<option value='$i' selected>$i</option>";
                            }else {
                              echo "<option value='$i'>$i</option>";
                            }

                          }

            echo "        </select></td>
                          <td>$entire_product_price €</td>
                          <td><a class='bag-delete' data-id='$id' href='index.php?site=bag'></a></td>
                        </tr>

                        <tr class='space'></tr>
                ";
          }

          if($gesamtpreis < 30){

            $gesamtpreis += 4.99;

            echo"<tr>
              <td><div class='bag-table-image-wrapper'><a class='bag-table-image-link' href='#'><img src='./images/shipping.svg' alt='Shipping'></a></div></td>
              <td>Free Shipping from 30 €</td>
              <td></td>
              <td>4.99 €</td>
              <td></td>
              </tr>

            ";
          } else {
            echo"<tr>
              <td><div class='bag-table-image-wrapper'><a class='bag-table-image-link' href='#'><img src='./images/shipping.svg' alt='Free Shipping'></a></div></td>
              <td>Free Shipping</td>
              <td></td>
              <td>0 €</td>
              <td></td>
              </tr>

            ";
          }

        }
        ?>
      </tbody>
    </table>
    <?php if(empty($_SESSION['bag'])){echo "<p class='empty-cart-message'>You have no items in your cart!</p>";} ?>

    <div class="checkout-wrapper">
      <p>Total: <?php echo $gesamtpreis; ?>€</p>
      <button class='bag-update' type="submit">Update!</button>
      <a href="index.php?site=checkout&amp;action=login-checkout">Check out!</a>
    </div>
    </form>
  </div>
