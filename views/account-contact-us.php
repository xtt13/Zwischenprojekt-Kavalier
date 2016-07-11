<?php

$email = $user[0]['email'];
$name = $user[0]['fullname'];

?>

<div class="contactform">
  <h3>Contact Us!</h3>
  <p>You have a question or want to contact us? Write us a message.</p>
  <form action="#" method="post">
    <input class="contactform-name" name='contactname' type="text" value='<?php echo $name; ?>' placeholder="Name">
    <br>
    <input class="contactform-email" name='contactemail' type="email" value='<?php echo $email; ?>' placeholder="Email Adress">
    <br>
    <select class="contactform-subject" name="contactsubject" id="blabla">
      <option value="0">Subject</option>
      <option value="complaint">Complaint</option>
      <option value="question">Question</option>
      <option value="other">Other</option>
    </select>
    <br>
    <textarea class="contactform-textarea" name="contactmessage" id="blablabla" cols="30" rows="10" placeholder="Message"></textarea>
    <br>
    <button type='submit' class='button-contact <?php if(isset($successcontact) && $successcontact == true){echo 'successcontact';} ?>' name='contactsbmt'><?php if(isset($successcontact) && $successcontact == true){echo '✓';} else { echo 'Send';}?></button>
  </form>
    <p class'error_message_contact'><?php if(isset($errormessagecontact)){echo $errormessagecontact;} ?></p>
</div>
