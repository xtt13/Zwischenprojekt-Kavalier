<?php
  if($_SESSION['summary'] !== true){
    redirect_to("index.php?site=checkout&action=summary");
  }

  $_SESSION['summary'] = false;
  $_SESSION['shippinginformation'] = false;
 ?>
