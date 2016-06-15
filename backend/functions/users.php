<?php

function get_users(){

  global $link;

   $sql = "SELECT * FROM users";
   //

   $result = mysqli_query($link, $sql);

   if (!$result){

     echo mysqli_error($link);

   }

   $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

   return $users;


}



 ?>
