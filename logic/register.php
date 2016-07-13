<?php

if(isset($_SESSION['registered']) && $_SESSION['registerd'] == true) {
  redirect_to('index.php?site=register-success');
}


if(!empty($_POST)){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_again = $_POST['password-again'];
  $adress = $_POST['streetandnumber'];
  $zip = $_POST['zip'];
  $location = $_POST['location'];
  $country = $_POST['country'];
  $age = $_POST['age'];

  $result = get_user_by_email($email);

$error = 2;
$error_message;


if(isset($_POST['sbmbtn']) && $_POST['sbmbtn'] == 'Register') {
  if($name !== '' && $email !== '' && $age !== '' && $password !== '' && $password_again !== '' && $location !== '' && $adress !== '' && $zip !== '' && $country !== ''){
    $error = 0;

    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      $error = 1;
      $error_message['email'] = 'Please insert a valid emailadress!';
    }

    if($result[0]['email'] == $email){
      $error = 1;
      $error_message['email'] = 'This email is already in use!';
    }

    if(!is_int($email)){
      $error = 1;
      $error_message['age'] = 'Please use a number!';
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
  $passwordhash_hashed = password_hash($password, PASSWORD_DEFAULT);
  $email = strtolower($email);
  register_user($name, $email, $passwordhash_hashed, $adress, $zip, $location, $country, $age);
  $_SESSION['registered'] == true;
  // redirect_to('index.php?site=registersuccess');
}
}
 ?>
