<?php
// if(is_admin()) {
//   redirect_to("backend/index.php");
// } else {

  include("views/login.php");

// }

    if(is_post_request()) {

      $email = mysqli_real_escape_string($link, $_POST["email"]);
      $password = mysqli_real_escape_string($link, $_POST["password"]);


      $sql = "SELECT email, password_hash, is_admin FROM users WHERE email = '$email'";
      $result = mysqli_query($link, $sql);

      if(mysqli_num_rows($result) === 1) {

          $user = mysqli_fetch_assoc($result);

          if(password_verify($password, $user["password_hash"])) {
            $_SESSION['logged_in'] = true;



            if($user["is_admin"] == 1){
                  $_SESSION["is_admin"] = true;
                  // redirect_to("backend/index.php");
                }

          // redirect_to("index.php?site=reservations&action=new");

          }
           else {
            $error = 1;
          }
        } else {
        $error = 1;
      }

      

      if($error == 1) {
        $errors["auth"] = "Die eingegebene Email-Passwort-Kombination stimmt nicht überein.";

        print_r($errors);
      }
    }




?>
