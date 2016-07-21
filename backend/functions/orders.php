<?php

function get_orders(){

  global $link;

   $sql = "SELECT * , DATE_FORMAT(orders.date_ordered, '%d.%m.%Y') AS date_ordered  FROM orders ORDER BY id DESC";
   //

   $result = mysqli_query($link, $sql);

   if (!$result){

     echo mysqli_error($link);

   }

   $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

   return $orders;


}

function get_product_detail($id){
  global $link;

  $sql = "SELECT products_sold.*, products.product_name AS product_name
          FROM products_sold LEFT JOIN products
          ON products_sold.product_id = products.id
          WHERE products_sold.order_id = '90'";

  $result = mysqli_query($link, $sql);

  if (!$result){

    echo mysqli_error($link);

  }

  $product_detail = mysqli_fetch_all($result, MYSQLI_ASSOC);

  return $product_detail;

}

function get_order_detail($id){

  global $link;

  $sql = "SELECT orders.*, orders.id AS order_id, users.* , DATE_FORMAT(orders.date_ordered, '%d.%m.%Y') AS date_ordered  FROM orders
          LEFT JOIN users ON orders.user_id = users.id
          WHERE orders.id = '$id'";

  $result = mysqli_query($link, $sql);

  if (!$result){

    echo mysqli_error($link);

  }
  $order_detail = mysqli_fetch_assoc($result);

  return $order_detail;
}

function order_sent($id){

  global $link;

  $sql = "UPDATE orders SET sent = '1' WHERE id = '$id'";

  $result = mysqli_query($link, $sql);

  if (!$result){

    echo mysqli_error($link);

  }

}


 ?>
