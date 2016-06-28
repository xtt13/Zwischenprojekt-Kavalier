<div class="wrapper-page login">
<div class="pwdreset">
<?php
if($showForm):
?>

<h1>Passwort vergessen</h1>
<p>Gib hier deine E-Mail-Adresse ein, um ein neues Passwort anzufordern.</p>

<?php
if(isset($error) && !empty($error)) {
	echo $error;
}
?>

<form action="index.php?site=pwdreset&amp;send=1" method="post">
E-Mail:<br>
<input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>"><br>
<input type="submit" value="Neues Passwort">
</form>

<?php
endif; //Endif von if($showForm)
?>

<?php
if(isset($success) && !empty($success)) {
	echo $success;
}
?>
</div>
</div>
