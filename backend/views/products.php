<div class="body-wrapper">
<h3 class="headline">Products</h3>
<a href="index.php?site=products&amp;action=new" class="button_new">new product</a>

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>product_name</th>
      <th>category</th>
      <th>price</th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
      <?php

      foreach($products as $product):?>
      <tr class="space"></tr>
      <tr class="table_row">
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['product_name']; ?></td>
        <td><?php echo $product['category']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <td>
          <a href="index.php?site=products&amp;action=edit&amp;id=<?php echo $product['id']; ?>" class="button_do">edit</a>
        </td>
        <td>
            <a href="index.php?site=products&amp;action=delet&amp;id=<?php echo $product['id']; ?>" class="button_do">delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
