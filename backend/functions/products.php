<?php

function get_products(){

 global $link;

  $sql = "SELECT products.*, categories.category AS product_category FROM products LEFT JOIN categories ON categories.id = products.category ORDER BY `products`.`id` ASC";
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

function get_categories(){

  global $link;

  $sql = "SELECT id, category AS category_name FROM categories";
  $result = mysqli_query($link, $sql);

  if(!$result) {

        echo mysqli_error($link);

    }

  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

  return $categories;

}

function get_category($id){

  global $link;

  $sql = "SELECT products.*, categories.category AS product_category FROM products LEFT JOIN categories ON categories.id = products.category WHERE products.id = '$id'";
  $result = mysqli_query($link, $sql);

  if(!$result){
      die(mysqli_error($link));
  }

  $category = mysqli_fetch_assoc($result);

  return $category;

}





function is_checked($value) {
  if($value) { return "checked"; }
}

 ?>
