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
require("views/charts.php");
?>
