<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];


  if($action == "view") {

    $orders = get_orders();
    require("views/orders.php");

  }elseif($action == "detail"){


    $id = (int)$_GET["id"];
    // enthält produkt information, anzahl und preis
    $product_detail = get_product_detail($id);
    // print_r($product_detail);
    $title = 'Order Detail';

    // enthält Order Information und User daten
    $order_detail = get_order_detail($id);
    // print_r($order_detail);

    require("views/orders-detail.php");


  }elseif ($action == 'edit') {

      $title = "Edit Order";
      require("views/products-form.php");
    }
  }




 ?>
