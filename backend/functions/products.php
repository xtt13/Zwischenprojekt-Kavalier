<?php

function get_products(){

 global $link;

  $sql = "SELECT * FROM products";
  //

  $result = mysqli_query($link, $sql);

  if (!$result){

    echo mysqli_error($link);

  }

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

  return $products;

}



 ?>
