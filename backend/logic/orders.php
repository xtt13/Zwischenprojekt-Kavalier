<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];


  if($action == "view") {

    $orders = get_orders();
    require("views/orders.php");

  }elseif($action == "detail"){

    $title = 'Order Detail';
    require("views/orders-detail.php");

  }
  // elseif($action == "edit"){
  //   $title = "Edit Order";
  //   require("views/products-form.php");
  // }
}


 ?>
