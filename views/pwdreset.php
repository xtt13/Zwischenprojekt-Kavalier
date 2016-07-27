<div class="wrapper-page login">
<div class="pwdreset">
<?php
if($showForm):
?>

<section class="pwdreset-section">
  <h1>New Password</h1>
  <p>Enter your Emailadress in order to get a new password!</p>
  <form action="index.php?site=pwdreset&amp;send=1" method="post">
  <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
  <?php
  if(isset($error) && !empty($error)) {
  	echo $error;
  }
  ?>
  <button type="submit" value="">New Password</button>
  </form>
</section>

<?php
endif; //Endif von if($showForm)
?>


<?php
if(isset($success) && !empty($success)) {
  echo "<section class='pwdreset-section'>
    <img src='images/success.svg' alt='Success!'>
    <p>$success</p>
    <a href='index.php?site=store'>Home</a>
  </section>";
}
?>




</div>
</div>
