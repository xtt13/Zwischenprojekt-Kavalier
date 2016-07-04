<?php

if(isset($_SESSION['registered']) && $_SESSION['registerd'] == true) {
  redirect_to('index.php?site=register-success');
}


if(!empty($_POST)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_again = $_POST['password-again'];
  $adress = $_POST['text'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

$error = 2;
$error_message;


if(isset($_POST['sbmbtn']) && $_POST['sbmbtn'] == 'Register') {
  if($name !== '' && $email !== '' && $password !== '' && $password_again !== '' && $adress !== '' && $zip !== '' && $country !== ''){
    $error = 0;

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      $error = 1;
      $error_message['email'] = 'Please insert a valid emailadress!';
    }

    if($password !== $password_again){
      $error = 1;
      $error_message['passwords'] = 'Unequal Passwords!';
    }

  } else {
    $error = 1;
    $error_message['email'] = 'Some Inputfields are empty!';
  }
}

if($error == 1){
  print_r($error_message);
}

if($error == 0){
  $passwordhash_hashed = password_hash($password_hash, PASSWORD_DEFAULT);
  register_user($name, $email, $passwordhash_hashed, $adress, $zip, $country);
  $_SESSION['registered'] == true;
  // redirect_to('index.php?site=registersuccess');
}
}
 ?>
