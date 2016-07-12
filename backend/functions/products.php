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

  $sql = "SELECT * FROM categories";
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

function save_product($name, $price, $sale, $stock, $description, $category, $mainimage, $otherimages){

  global $link;

  $sql =
  "INSERT INTO
  products (product_name, price, sale, stock,  description, category, image_main, image_other)
  VALUES
  ('$name', '$price','$sale','$stock', '$description' ,'$category', '$mainimage', '$otherimages')";

  $result = mysqli_query($link, $sql);

  if(!$result){

    die(mysqli_error($link));
  }

  return  $result;


}

function save_product_edit($id, $name, $price, $sale, $stock, $description, $category, $mainimage, $otherimages){

  global $link;

  $sql =
  "UPDATE products SET product_name = '$name', price = '$price', sale = '$sale', stock = '$stock',  description = '$description', category = '$category', image_main = '$image_main', image_other = '$image_other' WHERE id = '$id'";

  $result = mysqli_query($link, $sql);

  if(!$result){

    die(mysqli_error($link));
  }

  return  $result;


}






 ?>
