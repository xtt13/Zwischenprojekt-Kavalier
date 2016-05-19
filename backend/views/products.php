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
      <tr class="space"></tr>
      <tr class="table_content">
        <td>1</td>
        <td>Gentlemen's Set</td>
        <td>Gadgets</td>
        <td>19,90€</td>
        <td>
          <a href="index.php?site=products&amp;action=edit&amp;id=2" class="button">edit</a>
        </td>
        <td>
            <a href="index.php?site=products&amp;action=delet" class="button">delete</a>
        </td>
      </tr>
  </tbody>
</table>
</div>

<a href="index.php?site=reservations&amp;action=edit&amp;id=<?php echo $reservation['id']; ?>">edit</a>
<a href="index.php?site=reservations&amp;action=delete&amp;id=<?php echo $reservation['id']; ?>">delete</a>
