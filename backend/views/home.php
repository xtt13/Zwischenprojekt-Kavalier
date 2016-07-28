<?php

$result = get_new_orders();
$number_orders = $result['count'];
$result = get_registrated_users();
$number_users = $result['count'];
$result = get_sold_products();
$number_sold_products = $result['count'];


 ?>

<div class="body-wrapper home">
<h3 class="headline">Welcome Admin!</h3>
  <div class="info-wrapper">
    <div class='leftdiv'>
    <p>New Orders:</p>
    <p>New Messages:</p>
    <p>Registered Users:</p>
    <p>Sold Products:</p>
    </div>
    <div class='rightdiv'>
    <p><?php if(isset($number_orders)){echo $number_orders;} ?></p>
    <p><?php if(isset($number)){echo $number;} ?></p>
    <p><?php if(isset($number_users)){echo $number_users;} ?></p>
    <p><?php if(isset($number_sold_products)){echo $number_sold_products;} ?></p>
    </div>
  </div>
</div>

<?php



?>
