<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $users = get_users();

    require("views/users.php");

  }elseif($action == "new"){

    require("views/user-form.php");
  }
}


 ?>
