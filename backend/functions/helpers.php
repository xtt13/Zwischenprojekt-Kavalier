<?php
function redirect_to($location, $message = "") {
  $_SESSION["flash"] = $message;
  header("location: $location");
  exit();
}


function is_checked($value) {
  if(isset($value) && $value == true) { return "checked"; }
}

function get_messages(){
  global $link;
  $sql = "SELECT * FROM contact_messages ORDER BY id DESC";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $messages;
}

function get_new_messages() {
  global $link;
  $sql = "SELECT * FROM contact_messages WHERE replied = 0";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $messages = count($messages);
  return $messages;
}

function find_message($id) {
  global $link;
  $sql = "SELECT * FROM contact_messages WHERE id = '$id'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $message = mysqli_fetch_all($result, MYSQLI_ASSOC);
  return $message;
}

function update_reply($id, $message) {
  global $link;

  $sql = "UPDATE contact_messages SET replied = '1', reply_message = '$message', replied_at = now() WHERE id = '$id'";
  mysqli_query($link, $sql) or die(mysqli_error($link));

}

function check_if_user_exists($email){
  global $link;
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $user = mysqli_fetch_assoc($result);
  if($email == $user['email']){
    return $user['id'];
  } else {
    return false;
  }

}


 ?>
