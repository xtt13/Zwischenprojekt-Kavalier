<div class="wrapper-page bag">
  <div class="account-menu">
    <ul>
      <li><a href="index.php?site=account&amp;action=information">Your Information</a></li>
      <li><a href="index.php?site=account&amp;action=orders">Your Orders</a></li>
    </ul>
  </div>
<?php

  if(isset($_GET['action'])){

    if($_GET['action'] == 'orders'){

      include('logic/account-orders.php');
      include('views/account-orders.php');

    } elseif($_GET['action'] == 'information'){

      include('logic/account-information.php');
      include('views/account-information.php');

    } else {

      include('logic/account-information.php');
      include('views/account-information.php');
    }

  }


 ?>
</div>
