<?php

$order = get_order(89);

// Query von Userdaten
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($link, $sql) or die(mysqli_error($link));
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>
  <div class="wrapper-page shipping">

    <img class="progress_bar" src="images/progressbar3.svg" border="0" width="528" height="48" orgWidth="528" orgHeight="48" usemap="#image-maps-2016-03-26-060856" alt="" />
    <map name="image-maps-2016-03-26-060856" id="ImageMapsCom-image-maps-2016-03-26-060856">
    <area  alt="Login" title="Login" href="index.php?site=checkout&amp;action=login-checkout" shape="rect" coords="0,0,48,48" style="outline:none;" target="_self"     />
    <area  alt="Shippinginformation" title="" href="index.php?site=checkout&amp;action=shippinginformation" shape="rect" coords="161,0,208,48" style="outline:none;" target="_self"     />
    <area  alt="Summary" title="Summary" href="index.php?site=checkout&amp;action=summary" shape="rect" coords="320,0,367,48" style="outline:none;" target="_self"     />
    <area  alt="Thank You!" title="Thank You!" href="index.php?site=checkout&amp;action=success" shape="rect" coords="481,0,528,48" style="outline:none;" target="_self"     />
    <area shape="rect" coords="526,46,528,48" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
    </map>

    <section class="progressbar_text">
      <ul>
        <li>Login</li>
        <li>Shipping</li>
        <li>Summary</li>
        <li>Success</li>
      </ul>
    </section>

    <section class="summary-section">
      <h1>Summary</h1>

      <div class='summary-shippingadress-wrapper'>
        <div class='summary-shippingadress'><p>Shippingadress:</p></div>
        <div class='summary-personaldata'><p><?php echo $user[0]['fullname'] ?><br><?php echo $user[0]['street_and_number'] ?><br><?php echo $user[0]['zip'] ?><?php echo ' '.$user[0]['location'] ?><br><?php echo $user[0]['country'] ?></p></div>
      </div>

      <?php
        // Wenn die Alternative Checkbox gecheckt wurde wird die Alternative Invoiceadress angezeigt
        if(isset($_SESSION['alternative_adress']) && $_SESSION['alternative_adress'] == true){

          $alt_street_and_number = $user[0]['alt_street_and_number'];
          $alt_zip = $user[0]['alt_zip'];
          $alt_location = $user[0]['alt_location'];
          $alt_country = $user[0]['alt_country'];

          echo "
            <div class='summary-invoiceadress-wrapper'>
              <div class='summary-invoiceadress'><p>Invoiceadress:</p></div>
              <div class='summary-invoicedata'><p>$alt_street_and_number<br>$alt_zip $alt_location<br>$alt_country</p></div>
            </div>
          ";
        }

        echo "<p class='summary-payment'>Payment: <span>" . ucfirst($user[0]['payment']) . "</span></p>";
       ?>

      <table class="summary-table">
        <thead class="summary-table-head">
          <tr>
            <th></th>
            <th>Productname</th>
            <th>Size</th>
            <th>Amount</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>

          <tr class="summary-space"></tr>

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


                echo "
                  <tr>
                    <td><div class='summary-table-image-wrapper'><img src='./images/$image' alt='$image'></div></td>
                    <td>$name</td>
                    <td></td>
                    <td>$quantity</td>
                    <td>$entire_product_price €</td>
                  </tr>

                  <tr class='summary-space'></tr>
                    ";
              }

              // Wenn der Gesamtpreis <= 30€ ist, dann berechne 4,99€ Versand
              if($gesamtpreis <= 30){
                $gesamtpreis += 4.99;
                echo "
                  <tr>
                    <td><div class='summary-table-image-wrapper'><img src='./images/shipping.svg' alt='Shipping'></div></td>
                    <td>Shipping</td>
                    <td></td>
                    <td>1</td>
                    <td>4,99 €</td>
                  </tr>

                  <tr class='summary-space'></tr>
                ";

                // Wenn der Gesamtpreis > 30€ ist, dann berechne 0€ Versand
              } else {
                echo "
                  <tr>
                    <td><div class='summary-table-image-wrapper'><img src='./images/shipping.svg' alt='Shipping'></div></td>
                    <td>Free Shipping</td>
                    <td></td>
                    <td>1</td>
                    <td>0 €</td>
                  </tr>

                  <tr class='summary-space'></tr>
                ";
              }
            }
           ?>

          <tr class="summary-space"></tr>

        </tbody>
      </table>

      <div class="total-wrapper">
        <p class="total">Total: <?php echo $gesamtpreis; ?>€</p>
      </div>

      <form action="index.php?site=checkout&amp;action=summary" method="post">
        <button class="summary-buy" name="button-sbm-buy" type="submit" value="Buy">Buy!</button>
      </form>


    </section>



  </div>
