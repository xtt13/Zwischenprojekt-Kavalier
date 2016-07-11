<div class="body-wrapper search">
  <h3 class="headline">Messages</h3>

<?php if(isset($_GET) && isset($_GET['action']) && $_GET['action'] == 'reply' && isset($_GET['id'])):?>
  <?php
    $id = $_GET['id'];
    $result = find_message($id);
    
    if(isset($_POST) && isset($_POST['Sbmbtn'])){

      $email = $_POST['contactemail'];
      $subject = $_POST['contactsubject'];
      $message = $_POST['contactmessage'];

      $to = $email;
      mail($email, $subject, $message);

      $successcontact = true;
      update_reply($id, $message);

    }

   ?>
  <div class="contactform">
    <h3>Reply For</h3>

    <form action="#" method="post">
      <input class="contactform-name" name='contactname' type="text"   value='<?php echo $result[0]['fullname'];?>' placeholder="Name">
      <br>
      <input class="contactform-email" name='contactemail' type="email"   value='<?php echo $result[0]['email'];?>' placeholder="Email Adress">
      <br>
      <select class="contactform-subject"  name="contactsubject" id="blabla">
        <option value="Re: <?php echo ucfirst($result[0]['subject']);?>">Re: <?php echo ucfirst($result[0]['subject']);?></option>
      </select>
      <br>
      <textarea class="contactform-textarea" name="contactmessage" id="blablabla" cols="30" rows="10" placeholder="Message"></textarea>
      <br>
      <button type='submit' name='Sbmbtn' class='button-contact <?php if(isset($succescontact) && $successcontact == true){echo 'successcontact';} ?>' name='contactsbmt'><?php if(isset($successcontact) && $successcontact == true){echo '✓';} else { echo 'Send';}?></button>
    </form>
      <p class'error_message_contact'><?php if(isset($errormessagecontact)){echo $errormessagecontact;} ?></p>
  </div>
<?php else: ?>

  <div class="accordeon">


  <?php

      foreach ($messages as $message) {

      $id = $message['id'];
      $sender = $message['fullname'];
      $date = $message['created_at'];
      $email = strtolower($message['email']);
      $sent = $message['replied'];
      $subject = $message['subject'];
      $subject = strtoupper($subject);
      if($message['replied_at'] != NULL){
        $replied_at = date("d.m.Y", strtotime($message['replied_at']));
      }
      $content = $message['message'];
      $reply_message = nl2br($message['reply_message']);
      $content = nl2br($content);
      $date_format = date("d.m.Y", strtotime($date));

      $result = check_if_user_exists($email);


      echo "  <h3 class='accordeon-title'>$date_format <i>Sender: $sender</i><span ";

      if($sent == false){
        echo "class='order-sent'";
      }

      echo">";

      if($sent){
        echo "REPLIED";
      } else {
        echo "NEW";
      }

      echo "</h3>
              <div class='accordeon-content'>
                <div class='message-subject'><span>$subject</span>";

      if($result){
        echo "<span><a href='index.php?site=users&action=edit&id=$result'>User Exists ID: $result</a></span>";
      }

      if($sent == false){
        echo "<span><a href='index.php?site=messages&action=reply&id=$id'>REPLY</a></span>";
      }

      echo      "</div>
                <div class='message-content'>
                $content ";

                if($reply_message){
                  echo "
                            <div class='reply-content'>
                            <h3>Reply: $replied_at</h3>
                            $reply_message
                            </div>";
                }

                echo "</div>";


      echo "</div>";

      }




  ?>


  </div>



</div>

<?php endif ?>
