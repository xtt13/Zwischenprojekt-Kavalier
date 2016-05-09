<?php

  //Löschen von Produkten aus dem Warenkorb
  if(isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == 'delete'){
    // $key = array_search($_GET['id'], $_SESSION['bag']);
    $id = $_GET['id'];
    unset($_SESSION['bag'][$id]);
  }

  // Update von Produktanzahl im Warenkorb
  if(isset($_POST)) {
    foreach($_POST as $id => $quantity){
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

        // Wenn sich etwas im Warenkorb befindet
        if(isset($_SESSION['bag'])){
          $bag = $_SESSION['bag'];

          // echo "<pre>";
          // print_r($bag);
          // echo "</pre>";
          //
          // echo "<pre>";
          // print_r($_POST);
          // echo "</pre>";

          //echo "<form action='index.php?site=bag' method='post'>";

          foreach($bag as $bag_keys){

            // Warenkorb ID auf Variable legen
            $product_id = $bag_keys['id'];

            // Datenbankabfrage der Produkte
            $sql = "SELECT * FROM products WHERE id = '$product_id'";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // echo "<pre>";
            // print_r($_SESSION['bag']);
            // echo "</pre>";
            //print_r($products);

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
                          <td><div class='bag-table-image-wrapper'><a class='bag-table-image-link' href='index.php?site=detail&id=$id'><img src='./images/$image' alt='Nailkit'></a></div></td>
                          <td>$name</td>
                          <td></td>
                          <td><select class='bag-select' name='$id' onchange='this.form.submit()'>
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
                          <td><a class='bag-delete' href='index.php?site=bag&action=delete&id=$id'></a></td>
                        </tr>

                        <tr class='space'></tr>
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
      <a href="index.php?site=login&amp;action=checkout">Check out!</a>
    </div>
    </form>
  </div>
