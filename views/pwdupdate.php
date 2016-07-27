<div class="wrapper-page login">
<div class="pwdupdate">

<?php
if(!isset($update_password) && $update_password == false):
 ?>
 
<section class="pwdupdate-section">
  <h1>Set New Password</h1>
  <form action="index.php?site=pwdupdate&amp;send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">

  <input type="password" placeholder="Password" name="passwort"><br><br>

  <input type="password" placeholder="Password Again" name="passwort2"><br><br>

  <button type="submit">Save new password</button>
  </form>
</section>

<?php else: ?>
  <section class="pwdupdate-section">
    <h1>Success!</h1>

  </section>
<?php endif; ?>

</div>
</div>
