<?php


if(!empty($_POST)){
  $name = mysqli_real_escape_string($link, $_POST["name"]);
  $email = mysqli_real_escape_string($link, $_POST["email"]);
  $password = mysqli_real_escape_string($link, $_POST["password"]);
  $password_again = mysqli_real_escape_string($link, $_POST["password-again"]);
  $adress = mysqli_real_escape_string($link, $_POST["streetandnumber"]);
  $zip = mysqli_real_escape_string($link, $_POST["zip"]);
  $location = mysqli_real_escape_string($link, $_POST["location"]);
  $country = mysqli_real_escape_string($link, $_POST["country"]);
  $age = mysqli_real_escape_string($link, $_POST["age"]);

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

    if(isset($result[0]['email']) &&  $result[0]['email'] == $email){
      $error = 1;
      $error_message['email'] = 'This email is already in use!';
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

// if($error == 1){
//   print_r($error_message);
// }

if($error == 0){
  $passwordhash_hashed = password_hash($password, PASSWORD_DEFAULT);
  $email = strtolower($email);
  register_user($name, $email, $passwordhash_hashed, $adress, $zip, $location, $country, $age);
  $registered = true;
  // $_SESSION['registered'] = true;
  // redirect_to('index.php?site=registersuccess');
}
}
 ?>
