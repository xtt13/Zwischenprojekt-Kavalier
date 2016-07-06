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
};

function get_user($id){

  global $link;

  $sql = "SELECT * FROM users WHERE id = '$id' ";
  $result = mysqli_query($link, $sql);

  if(!$result) {
      die(mysqli_error($link));
    }

    // fetch_assoc liest die 1. zeile aus die mysql zurückgibt (1-dimensionales array)
    $user = mysqli_fetch_assoc($result);

    return $user;

};

function save_user($fullname, $email, $password_hashed, $street_and_number, $zip_and_location, $country){

  global $link;

    $sql = "INSERT INTO users (fullname, email, password_hash, street_and_number, zip_and_location, country)
    VALUES ('$fullname', '$email', '$password_hashed', '$street_and_number', '$zip_and_location', '$country')";

    mysqli_query($link, $sql) or die(mysqli_error($link));

}


 ?>
