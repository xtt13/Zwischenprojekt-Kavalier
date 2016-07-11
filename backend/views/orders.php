
<div class="body-wrapper">
<h3 class="headline">Orders</h3>

<?php
?>

<table class="table">
  <thead class="t-head">
    <tr>
      <th>order_id</th>
      <th>user_id</th>
      <th>total_price</th>
      <th>date_ordered</th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody class="t-body">
    <?php   ?>
    <?php foreach($orders as $order) : ?>
      <tr class="space"></tr>
      <tr class="table_row">
        <td><?php echo $order['id']; ?></td>
        <td><?php echo $order['user_id']; ?></td>
        <td><?php echo $order['total_price']; ?>€</td>
        <td><?php echo $order['date_ordered']; ?></td>
        <td>
          <a href="index.php?site=orders&amp;action=detail&amp;id=<?php echo $order['id'];?>" class="button_do">detail</a>
        </td>
        <td>
            <a href="index.php?site=orders&amp;action=shipped" class="button_do">shipped</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
