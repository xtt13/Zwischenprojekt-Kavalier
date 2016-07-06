<?php
function redirect_to($location, $message = "") {
  $_SESSION["flash"] = $message;
  header("location: $location");
  exit();
}


function is_checked($value) {
  if($value == 'on') { return "checked"; }
}
 ?>
