<?php

function get_purchases_from_user($user_id){
  global $link;
  $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $purchases = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $purchases;
}

function get_products_from_orderid($order_id){
  global $link;
  $sql = "SELECT * FROM products_sold WHERE order_id = '$order_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

function get_product_from_productid($product_id){
  global $link;
  $sql = "SELECT * FROM products WHERE id = '$product_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $product;
}

function register_user($fullname, $email, $password_hash, $street_and_number, $zip_and_location, $country){
  global $link;
  $sql = "INSERT INTO users (fullname, email, password_hash, street_and_number, zip_and_location, country) VALUES ('$fullname', '$email', '$password_hash', '$street_and_number', '$zip_and_location', '$country')";
  mysqli_query($link, $sql) or die(mysqli_error($link));
}

function get_purchases_by_email($email){
  global $link;
  $sql = "SELECT * FROM orders WHERE email = '$email' ORDER BY id DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $purchases = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $purchases['id'];
}

function get_userid_by_email($email){
  global $link;
  $sql = "SELECT * FROM users WHERE email LIKE '%$email%' ORDER BY id DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $emails;
}

function get_all_orders($order_id){
  global $link;
  $sql = "SELECT * FROM products_sold WHERE order_id = '$order_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

function get_user_by_id($id){
  global $link;
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}



 ?>
