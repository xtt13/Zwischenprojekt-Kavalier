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
    $user['email'] = "";
    $user['street_and_number'] = "";
    $user['zip_and_location'] = "";
    $user['country'] = "";


    require("views/user-form.php");

/* ####### EDIT #######*/

  }elseif($action == "delet"){

    $id = (int)$_GET["id"];

    delet_user($id);

    echo 'deleted User';

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
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password_again = $_POST['password-confirm'];
      $adress = $_POST['street_and_number'];
      $zip = $_POST['zip'];
      $country = $_POST['country'];
      $is_admin = $_POST['is_admin'];
      /* Variable Error auf 2 damit gestzt und nicht 0 oder 1*/
      $error = 2;
      $error_message;

      if($id !== '' && $name !== '' && $email !== '' && $password !== '' && $password_again !== '' && $adress !== '' && $zip !== '' && $country !== ''){

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
        $title = "Edit User";
        $form_action ="index.php?site=users&action=save_edit";
        $submit_button_text = "Save";

        $user = [];
        $user["id"] = $id;
        $user["fullname"] = $name;
        $user['email'] = $email;
        $user['street_and_number'] = $adress;
        $user['zip_and_location'] = $zip;
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

        $passwordhash_hashed = password_hash($password_hash, PASSWORD_DEFAULT);
        update_user($id,$name, $email, $passwordhash_hashed, $adress, $zip, $country, $is_admin);
        // $_SESSION['registered'] == true;
        $users = get_users();
        require('views/users.php');
    }
/* ####### SAVE_USER #######*/

  }elseif($action == "save_user"){
    if(!empty($_POST)){

      $name = $_POST['fullname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password_again = $_POST['password-confirm'];
      $adress = $_POST['street_and_number'];
      $zip = $_POST['zip'];
      $country = $_POST['country'];
      $is_admin = $_POST['is_admin'];


      $error = 2;
      $error_message;

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
        $title = "New User";
        $form_action ="index.php?site=users&action=save_user";
        $submit_button_text = "Save";

        $user = [];
        $user["fullname"] = $name;
        $user['email'] = $email;
        $user['street_and_number'] = $adress;
        $user['zip_and_location'] = $zip;
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

        $passwordhash_hashed = password_hash($password_hash, PASSWORD_DEFAULT);
        save_user( $name, $email, $passwordhash_hashed, $adress, $zip, $country, $is_admin);
        $_SESSION['registered'] == true;
        $users = get_users();
        require('views/users.php');
    }
    }

}

 ?>
