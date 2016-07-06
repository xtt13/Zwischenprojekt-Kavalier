<?php

  if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
    redirect_to("index.php?site=homepage");
  }

 ?>
