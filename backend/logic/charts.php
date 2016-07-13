<?php

/*Day of order*/
/*muss man noch nach Wochentag sortieren*/

$sql='SELECT DAYNAME(date_ordered) AS daynames, COUNT(date_ordered) AS amount FROM orders GROUP BY DAYNAME(date_ordered)';
$result = $result = mysqli_query($link, $sql);

$day_of_order = mysqli_fetch_all($result, MYSQLI_ASSOC);

$daynames = [];
$amount = [];

foreach ($day_of_order as $time) {
  array_push($daynames, $time['daynames']);
  array_push($amount, $time['amount']);
}

$day_of_order = array(
  'daynames' => $daynames,
  'amount' => $amount

);


/* Hour of order */

$sql='SELECT HOUR(date_ordered) AS hour, COUNT(date_ordered) AS amount FROM orders GROUP BY HOUR(date_ordered)';
$result = mysqli_query($link, $sql);

$hour_of_order = mysqli_fetch_all($result, MYSQLI_ASSOC);

$hour = [];
$amount = [];

foreach ($hour_of_order as $time) {
  array_push($hour, $time['hour']);
  array_push($amount, $time['amount']);
}

$hour_of_order = array(
  'hour' => $hour,
  'amount' => $amount

);

/* ZIP of Order*/

$sql='SELECT zip, COUNT(zip) AS amount FROM users GROUP BY zip';
$result = $result = mysqli_query($link, $sql);

$zip_of_order = mysqli_fetch_all($result, MYSQLI_ASSOC);

$zip = [];
$amount= [];

foreach ($zip_of_order as $bezirk) {
  array_push($zip, $bezirk['zip']);
  array_push($amount, $bezirk['amount']);
}

$zip_of_order = array(
  'zip' => $zip,
  'amount' => $amount
);


/* 3 best Sold Products*/

$sql = 'SELECT products_sold.product_id AS product_id, COUNT(products_sold.quantity) AS amount, products.product_name AS product_name
        FROM products_sold LEFT JOIN products ON products_sold.product_id = products.id
        GROUP BY products_sold.product_id  LIMIT 3';

$result = $result = mysqli_query($link, $sql);

$sold_products =  mysqli_fetch_all($result, MYSQLI_ASSOC);

$product_name = [];
$amount = [];

foreach ($sold_products as $product) {
  array_push($product_name, $product['product_name']);
  array_push($amount, $product['amount']);
}

$sold_products = array(
  'product_name' => $product_name,
  'amount' => $amount

);

/* Order Payment*/

$sql='SELECT COUNT(payment) AS amount, payment FROM users GROUP BY payment';
$result = $result = mysqli_query($link, $sql);

$order_payment = mysqli_fetch_all($result, MYSQLI_ASSOC);

$payment_name = [];
$amount = [];

foreach ($order_payment as $payment) {
  array_push($payment_name, $payment['payment']);
  array_push($amount, $payment['amount']);
}

$order_payment = array(

  'payment_name' => $payment_name,
  'amount' => $amount

);
/* All sold products */

$sql = 'SELECT products_sold.product_id AS product_id, COUNT(products_sold.quantity) AS amount, products.product_name AS product_name
        FROM products_sold LEFT JOIN products ON products_sold.product_id = products.id
        GROUP BY products_sold.product_id';

$result = $result = mysqli_query($link, $sql);

$all_sold_products =  mysqli_fetch_all($result, MYSQLI_ASSOC);

$product_name = [];
$amount = [];

foreach ($all_sold_products as $product) {
  array_push($product_name, $product['product_name']);
  array_push($amount, $product['amount']);
}

$all_sold_products = array(
  'product_name' => $product_name,
  'amount' => $amount

);

require("views/charts.php");

?>
