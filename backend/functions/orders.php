<?php

function get_orders(){

  global $link;

   $sql = "SELECT * FROM orders";
   //

   $result = mysqli_query($link, $sql);

   if (!$result){

     echo mysqli_error($link);

   }

   $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

   return $orders;


}


 ?>
