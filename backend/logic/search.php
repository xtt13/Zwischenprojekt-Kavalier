<?php

if(isset($_GET['request'])){
  $request = $_GET['request'];
  $id = $request;
} else {
  $id = 1;
}



$purchases = get_purchases_from_user($id);

 ?>
