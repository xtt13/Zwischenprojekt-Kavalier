<?php

if(isset($_GET['action'])) {

  $action = $_GET["action"];

  if($action == "view") {

    $users = get_users();

    require("views/users.php");

  }elseif($action == "new"){

    $title = "New User";
    $form_action ="index.php?site=users&action=save_user";
    $submit_button_text = "Save";

    $user = [];
    $user["fullname"] = "";
    $user['email'] = "";
    $user['street_and_number'] = "";
    $user['zip_and_location'] = "";
    $user['country'] = "";

    require("views/user-form.php");
  }elseif($action == "edit"){

    $id = (int)$_GET["id"];

    $title = "Edit User";
    $form_action ="index.php?site=users&action=edit_user";
    $submit_button_text = "Edit";

    $user = get_user($id);

    require("views/user-form.php");
  }elseif($action == "save_user"){

    $passwordhash_hashed = password_hash($password_hash, PASSWORD_DEFAULT);
    register_user($name, $email, $passwordhash_hashed, $adress, $zip, $country);
    $_SESSION['registered'] == true;
    redirect_to('index.php?site=users&action=view' , 'User erstellt!');

  };
}


 ?>
