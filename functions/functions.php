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

// Ein Query um alle Angebote abzurufen
function all_sale_products_query(){
  global $link;
  $sql = "SELECT * FROM products WHERE active = 1 AND sale = 1";
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

function get_order($order_id){
  global $link;
  $sql = "SELECT * FROM orders LEFT JOIN products_sold ON orders.id = products_sold.order_id WHERE orders.id = '$order_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $order = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $order;
}

function get_product($product_id){
  global $link;
  $sql = "SELECT * FROM products WHERE id = '$product_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $product;
}

function get_user($user_id){
  global $link;
  $sql = "SELECT * FROM users WHERE id = '$user_id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $user;
}

function get_user_by_email($email){
  global $link;
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $user;
}

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

function update_passwordcode($passwordcode, $user_id){
  global $link;
  $sql = "UPDATE users SET passwordcode = '$passwordcode', passwordcode_time = now() WHERE id = '$user_id'";
  mysqli_query($link, $sql) or die(mysqli_error($link));
}

function update_password($password_hash, $id){
  global $link;
  $sql = "UPDATE users SET password_hash = '$password_hash', passwordcode = NULL, passwordcode_time = NULL WHERE id = '$id'";
  mysqli_query($link, $sql) or die(mysqli_error($link));
}

// Funktion zum Generieren des Randomstrings (Für PW Reset)
function random_string() {
	if(function_exists('random_bytes')) {
		$bytes = random_bytes(16);
		$str = bin2hex($bytes);
	} else if(function_exists('openssl_random_pseudo_bytes')) {
		$bytes = openssl_random_pseudo_bytes(16);
		$str = bin2hex($bytes);
	} else if(function_exists('mcrypt_create_iv')) {
		$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$str = bin2hex($bytes);
	} else {
		$str = md5(uniqid('euer_geheimer_string', true));
	}
	return $str;
}


?>
