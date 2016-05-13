<?php
 ?>
<div class="body-wrapper">
<h3 class="headline">Orders</h3>

<table>
  <thead>
    <tr>
      <th>order_id</th>
      <th>user_id</th>
      <th>total price</th>
      <th>date_ordered</th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody>
      <tr class="space"></tr>
      <tr class="table_content">
        <td>1</td>
        <td>24</td>
        <td>95,60€</td>
        <td>12.04.2015 12:35</td>
        <td>
          <a href="index.php?site=orders&amp;action=edit" class="button">edit</a>
        </td>
        <td>
            <a href="index.php?site=orders&amp;action=shipped" class="button">shipped</a>
        </td>
      </tr>
  </tbody>
</table>
</div>
