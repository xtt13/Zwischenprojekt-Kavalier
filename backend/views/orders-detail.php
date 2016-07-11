<div class="body-wrapper">
  <h3 class="headline">Order Nr. <?php echo $order_detail['order_id']?></h3>
  <div class="detail-wrapper">

    <div class="detail-element-wrapper">

      <h3 class="detail-headline"><?php echo $order_detail['fullname'] ?></h3>
      <h3 class="detail-headline">Ordered on <?php echo $order_detail['date_ordered'] ?></h3>
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
            <td><?php echo $product['quantity'];?></td>
            <td><?php echo $product['product_name'];?></td>
              <td><?php echo $product['price'];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot class="detail-table-foot">
        <tr>
          <td></td>
          <td>  </td>
          <td><?php echo $order_detail['total_price']?>€</td>
        </tr>
      </tfoot>
    </table>

    </div>

    <div class="detail-element-wrapper">
    <h3 class="detail-headline">Invoice Adress</h3>
      <p>
      <?php echo $order_detail["street_and_number"] ?>
      <br>
      <?php echo $order_detail['zip_and_location'] ?>
      <br>
      <?php echo $order_detail['country'] ?>
    </p>
    <h3 class="detail-headline">Adress</h3>
    <p>
      <?php echo $order_detail['alt_street_and_number'] ?>
      <br>
      <?php echo $order_detail['alt_zip_and_location'] ?>
      <br>
      <?php echo $order_detail['alt_country'] ?>
    </p>

    </div>

  </div>
  <a href="index.php?site=orders&amp;action=edit&amp;id=<?php echo $order['id']; ?>" class="button_do">edit</a>

</div>
