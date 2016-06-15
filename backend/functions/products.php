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

function get_product($id){

  global $link;

  $sql = "SELECT * FROM products WHERE id = '$id' ";
  $result = mysqli_query($link, $sql);

  if(!$result) {
      die(mysqli_error($link));
    }

    // fetch_assoc liest die 1. zeile aus die mysql zurückgibt (1-dimensionales array)
    $product = mysqli_fetch_assoc($result);

    return $product;
  }





function is_checked($value) {
  if($value) { return "checked"; }
}

 ?>
