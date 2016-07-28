<div class="body-wrapper orders-detail">
  <h3 class="headline">Order Nr. <?php echo $order_detail['order_id']?></h3>
  <div class="detail-wrapper">

    <div class="detail-element-wrapper">

      <h3 class="detail-headline"><a href='index.php?site=users&amp;action=edit&amp;id=<?php echo $order_detail['id'] ?>'><?php echo $order_detail['fullname'] ?></a></h3>
      <h3 class="detail-headline2">Ordered on <?php echo $order_detail['date_ordered'] ?></h3>
    <table  class="detail-table">
      <thead class="detail-table-head">
        <tr>
          <th>Quantity</th>
          <th>Productname</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody class="detail-table-body">

        <?php foreach($product_detail as $key => $product) : ?>
          <tr>
            <td><?php echo $product['quantity'];?>x</td>
            <td><?php echo $product['product_name'];?></td>
              <td><?php echo $product['price'];?> €</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot class="detail-table-foot">
        <tr>
          <td><b>Total Price:</b></td>
          <td></td>
          <td><b><?php echo $order_detail['total_price']?> €</b></td>
        </tr>
      </tfoot>
    </table>

    </div>

    <div class="detail-element-wrapper">
    <h3 class="detail-headline">Adress:</h3>
      <p>
      <?php echo $order_detail["street_and_number"] ?>
      <br>
      <?php echo $order_detail['zip'] ?>
      <?php echo $order_detail['location'] ?>
      <br>
      <?php echo $order_detail['country'] ?>
    </p>


    <?php if($order_detail['alt_shipping'] == 1): ?>
    <h3 class="detail-headline">Invoice Adress:</h3>
    <p>
      <?php echo $order_detail['alt_street_and_number'] ?>
      <br>
      <?php echo $order_detail['alt_zip'] ?>
      <?php echo $order_detail['alt_location'] ?>
      <br>
      <?php echo $order_detail['alt_country'] ?>
    </p>
  <?php endif; ?>

    </div>

  </div>
  <a href="index.php?site=orders&amp;action=back" class="button_do">back</a>

</div>
