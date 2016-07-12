<div class="wrapper-page bag">
  <div class="account-menu">
    <ul>
      <li><a href="index.php?site=account&amp;action=information">Your Information</a></li>
      <li><a href="index.php?site=account&amp;action=orders">Your Orders</a></li>
      <li><a href="index.php?site=account&amp;action=contactus">Contact Us!</a></li>
      <li><a href="index.php?site=account&amp;action=contactus">Contact Us!</a></li>
      <?php if(isset($_SESSION['is_admin'])) {
        echo "<li><a href='backend/index.php'>Backend</a></li>";
      } ?>

    </ul>
  </div>
<?php

  if(isset($_GET['action'])){

    if($_GET['action'] == 'orders'){

      include('logic/account-orders.php');
      include('views/account-orders.php');

    } elseif($_GET['action'] == 'contactus'){

      include('logic/account-contact-us.php');
      include('views/account-contact-us.php');

    } elseif($_GET['action'] == 'information'){

      include('logic/account-information.php');
      include('views/account-information.php');

    } else {

      include('logic/account-information.php');
      include('views/account-information.php');
    }

  } else {

    include('logic/account-orders.php');
    include('views/account-orders.php');

  }


 ?>
</div>
