<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

/* ####### VIEW #######*/

  if($action == "view") {

    $users = get_users();

    require("views/users.php");

  }elseif($action == "new"){

    $title = "New User";
    $form_action ="index.php?site=users&action=save_user";
    $submit_button_text = "Save";

    $user= [];
    $user["fullname"] = "";
    $user["age"]="";
    $user['email'] = "";
    $user['street_and_number'] = "";
    $user['zip'] = "";
    $user['location'] = "";
    $user['country'] = "";


    require("views/user-form.php");

/* ####### DELETE #######*/

  }elseif($action == "delet"){

    $id = (int)$_GET["id"];

    delet_user($id);

    $users = get_users();
    $success = "Deleted user";
    require('views/users.php');



  /* ####### EDIT #######*/
  }elseif($action == "edit"){

    $id = (int)$_GET["id"];

    $title = "Edit User";
    $form_action ="index.php?site=users&action=save_edit";
    $submit_button_text = "Edit";

    $user = get_user($id);

    require("views/user-form.php");

  /* ####### SAVE EDIT #######*/

  }elseif($action == 'save_edit'){

    if(!empty($_POST)){

      $id = $_POST['id'];
      $name = $_POST['fullname'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      // $password = $_POST['password'];
      // $password_again = $_POST['password-confirm'];
      $adress = $_POST['street_and_number'];
      $zip = $_POST['zip'];
      $location = $_POST['location'];
      $country = $_POST['country'];
      $is_admin = $_POST['is_admin'];
      /* Variable Error auf 2 damit gestzt und nicht 0 oder 1*/
      $error = 2;
      $error_message;

      if($id !== '' && $name !== '' && $age !== '' && $email !== '' && $adress !== '' && $zip !== '' && $location !== '' && $country !== ''){

        $error = 0;

        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
          $error = 1;
          $error_message['email'] = 'Please insert a valid emailadress!';
        }

        }
      }
      if($error == 1){
        $title = "Edit User";
        $form_action ="index.php?site=users&action=save_edit";
        $submit_button_text = "Save";

        $user = [];
        $user["id"] = $id;
        $user["fullname"] = $name;
        $user['age'] = $age;
        $user['email'] = $email;
        $user['street_and_number'] = $adress;
        $user['zip'] = $zip;
        $user['location'] = $location;
        $user['country'] = $country;
        $user['is_admin'] = $is_admin;

        require("views/user-form.php");
      }

    if($error == 0){
        if($is_admin == 'on'){
          $is_admin = 1;
        }else{
          $is_admin = 0;
        }

        update_user($id,$name, $email, $adress, $zip, $location, $country, $is_admin, $age);

        $registered = true;
        $users = get_users();
        $success = "Saved edit";
        require('views/users.php');
    }
/* ####### SAVE_USER #######*/

  }elseif($action == "save_user"){
    if(!empty($_POST)){

      $name = $_POST['fullname'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password_again = $_POST['password-confirm'];
      $adress = $_POST['street_and_number'];
      $zip = $_POST['zip'];
      $location = $_POST['location'];
      $country = $_POST['country'];
      $is_admin = $_POST['is_admin'];


      $error = 2;
      $error_message;

      if($name !== '' && $age !== '' && $email !== '' && $password !== '' && $password_again !== '' && $adress !== '' && $zip !== '' && $location !== '' && $country !== ''){

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
        $title = "New User";
        $form_action ="index.php?site=users&action=save_user";
        $submit_button_text = "Save";

        $user = [];
        $user["fullname"] = $name;
        $user["age"] = $age;
        $user['email'] = $email;
        $user['street_and_number'] = $adress;
        $user['zip'] = $zip;
        $user['location'] = $location;
        $user['country'] = $country;
        $user['is_admin'] = $is_admin;

        require("views/user-form.php");
      }


    if($error == 0){
        if($is_admin == 'on'){
          $is_admin = 1;
        }else{
          $is_admin = 0;
        }
        $password_hash = $password;
        $passwordhash_hashed = password_hash($password_hash, PASSWORD_DEFAULT);
        save_user( $name, $email, $passwordhash_hashed, $adress, $zip,$location, $country, $is_admin,$age);
        $registered = true;
        $users = get_users();
        $success = "Saved new user";
        require('views/users.php');
    }
    }

}

 ?>
