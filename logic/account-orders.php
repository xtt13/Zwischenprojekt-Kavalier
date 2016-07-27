<?php

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
}

$purchases = get_purchases_from_user($id);


 ?>
