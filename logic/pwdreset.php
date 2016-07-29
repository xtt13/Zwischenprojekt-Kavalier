
<?php

$showForm = true;

if(isset($_GET['send']) ) {

	if(!isset($_POST['email']) || empty($_POST['email'])) {
		$error = "<b class='pwdreset-error'>Insert a emailadress!</b>";
	} else {

    $email_from_form = mysqli_real_escape_string($link, $_POST["email"]);
		$user = get_user_by_email($email_from_form);

		if(empty($user)) {
			$error = "<b class='pwdreset-error'>No User found!</b>";
		} else {

      $user_id = $user[0]['id'];

			//Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
			$passwordcode = random_string();

      update_passwordcode($passwordcode, $user_id);

			$empfaenger = $user[0]['email'];
			$betreff = "New Password for your Kavalier.at Account";
			$from = "From: Kavalier.at <noreplay@kavalier.at>";
			$url_passwortcode = 'http://rotrock.at/index.php?site=pwdupdate&userid='.$user[0]['id'].'&code='.$passwordcode;
			$text = 'Hallo '.$user[0]['fullname'].', a new password was requested on your account. Open the link within 24 hours.

    '.$url_passwortcode.'

If you remember you password, you may ignore this mail.

Greetings,
Kavalier.at';

			mail($empfaenger, $betreff, $text, $from);

			$success = "Reset Password Kavalier.at";
			$showForm = false;
		}
	}
}

?>
