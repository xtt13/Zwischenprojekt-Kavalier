<div class="body-wrapper search">
  <h3 class="headline">Order-Search</h3>

  <form class="request_form" action="#" method="get">
    <input class="search_request" placeholder='User-ID or Emailadress' type="text" name="search_request" value="">
  </form>

  <div class="answer">
    <p>
    <?php if(isset($sugg_name)){echo 'Showing: '.$sugg_name;} ?>
    </p>
  </div>

  <div class="accordeon">


  <?php

  if(isset($purchases)){

      foreach ($purchases as $purchase) {

      $order_id = $purchase['id'];
      $total_price = $purchase['total_price'];
      $order_payment = ucfirst($purchase['payment']);
      $user_id = $purchase['user_id'];
      $date = $purchase['date_ordered'];
      $sent = $purchase['sent'];
      $date_format = date("d.m.Y", strtotime($date));

      $products = get_products_from_orderid($order_id);

      foreach ($products as $product) {

        $product_id = $product['product_id'];

        $product_infos = get_product_from_productid($product_id);

        // foreach ($product_infos as $product_info) {
        //
        // }

      }

      echo "  <h3 class='accordeon-title'>$date_format <i>Order-ID: $order_id</i><span ";

      if($sent){
        echo "class='order-sent'";
      }

      echo">";

      if($sent){
        echo "SENT";
      } else {
        echo "PENDING";
      }

      echo "</h3>
              <div class='accordeon-content'>
                <table>
                  <thead>
                      <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                      </tr>
                  </thead>
                  <tbody>";

                  // echo"<pre>";
                  // print_r($products);
                  // echo"</pre>";

                  foreach ($products as $product) {

                    $product_id = $product['product_id'];
                    $product_price = $product['price'];
                    $product_quantity = $product['quantity'];
                    $product_price = $product['price'];
                    $product_infos = get_product_from_productid($product_id);
                    $product_image = $product_infos[0]['image_main'];
                    $product_title = $product_infos[0]['product_name'];




                    echo "<tr>";
                    echo "<td><a href='index.php?site=detail&id=$product_id'><img class='search-image' src='../images/$product_image' alt=''></a></td>
                          <td><a href='index.php?site=detail&id=$product_id'>$product_title</a></td>
                          <td>$product_quantity x</td>
                          <td>$product_price €</td>";
                    echo "</tr>";

                    }
                    // echo "<tr><td></td><td></td><td></td><td></td>$total_price €<tr>";



      echo"         </tbody>
                </table>
                <p class='totalprice'>User ID: <a href='index.php?site=users&action=edit&id=$user_id'>$user_id</a></p>
                <p class='totalprice'>Payment: $order_payment </p>
                <p class='totalprice'>Total Price: $total_price €</p>
              </div>";

      }
  }



  ?>


  </div>



</div>
