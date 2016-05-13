<?php


function redirect_to($location, $message = "") {
  $_SESSION["flash"] = $message;
  header("location: $location");
  exit();
}

function is_post_request() {
  return (strtolower($_SERVER["REQUEST_METHOD"]) == "post" && !empty($_POST));
}

// Ein Query um alle Produkte abzurufen
function all_products_query(){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

// Ein Query um Produkte einer Kategorie abzurufen
function category_product_query($category){
  global $link;
  $sql = "SELECT * FROM products WHERE category='$category' AND active = 1";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

// Ein Query um alle Produkte nach Preis H-T-L zu sortieren
function price_high_to_low(){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1 ORDER BY price DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

// Ein Query um alle Produkte nach Preis L-T-H zu sortieren
function price_low_to_high(){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1 ORDER BY price";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

// Ein Query um alle Produkte nach Preis H-T-L in einer Kategorie zu sortieren
function price_high_to_low_category($category){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1 AND category='$category' ORDER BY price DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

// Ein Query um alle Produkte nach Preis L-T-H in einer Kategorie zu sortieren
function price_low_to_high_category($category){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1 AND category='$category' ORDER BY price";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $products;
}

function get_order($id){
  global $link;
  $sql = "SELECT * FROM orders LEFT JOIN products_sold ON orders.id = products_sold.order_id WHERE orders.id = '$id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $order = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $order;
}

function get_product($id){
  global $link;
  $sql = "SELECT * FROM products WHERE id = '$id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $product;
}




?>
