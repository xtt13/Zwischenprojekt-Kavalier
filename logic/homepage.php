<?php

// Validation Newsletter inkl. insert into database
if(!empty($_POST) && isset($_POST['newslettersbmt'])){

  $newslettername = $_POST['newslettername'];
  $newsletteremail_not_lower = $_POST['newsletteremail'];
  $newsletteremail = strtolower($newsletteremail_not_lower);

  if($newslettername != '' && $newsletteremail != ''){
    if (filter_var($newsletteremail, FILTER_VALIDATE_EMAIL)) {
      $result = get_newsletter_email($newsletteremail);
      if($newsletteremail == $result['email']){
        $errormessagenewsletter = 'This email is listed!';
        $successnewsletter = false;
      } else {

        register_to_newsletter($newslettername, $newsletteremail);
        $successnewsletter = true;
      }
    } else {
      $errormessagenewsletter = 'Please use a valid emailadress!';
      $successnewsletter = false;
    }
  } else {
    $errormessagenewsletter = 'Please fill out the Newsletterform!';
    $successnewsletter = false;
  }

}

// Contactform Validation 
if(!empty($_POST) && isset($_POST['contactsbmt'])){
  $contactname = $_POST['contactname'];
  $contactemail = $_POST['contactemail'];
  $contactsubject = $_POST['contactsubject'];
  $contactmessage = $_POST['contactmessage'];


  if($contactname != '' && $contactemail != '' && $contactsubject != '' && $contactmessage != ''){
    if (filter_var($contactemail, FILTER_VALIDATE_EMAIL)) {
      insert_into_contactdb($contactname, $contactemail, $contactsubject, $contactmessage);
      $successcontact = true;
    } else {
      $errormessagecontact = 'Please use a valid emailadress!';
      $successcontact = false;
    }
  } else {
    $errormessagecontact = 'Please fill out the contactform!';
    $successcontact = false;
  }

}



 ?>
