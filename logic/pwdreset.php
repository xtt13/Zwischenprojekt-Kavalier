
<?php

// Funktion zum Generieren des Randomstrings
function random_string() {
	if(function_exists('random_bytes')) {
		$bytes = random_bytes(16);
		$str = bin2hex($bytes);
	} else if(function_exists('openssl_random_pseudo_bytes')) {
		$bytes = openssl_random_pseudo_bytes(16);
		$str = bin2hex($bytes);
	} else if(function_exists('mcrypt_create_iv')) {
		$bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
		$str = bin2hex($bytes);
	} else {
		$str = md5(uniqid('euer_geheimer_string', true));
	}
	return $str;
}


$showForm = true;

if(isset($_GET['send']) ) {

	if(!isset($_POST['email']) || empty($_POST['email'])) {
		$error = "<b class='pwdreset-error'>Bitte eine E-Mail-Adresse eintragen</b>";
	} else {

    $email_from_form = $_POST['email'];
		$user = get_user_by_email($email_from_form);

    //print_r($user);


		if(empty($user)) {
			$error = "<b class='pwdreset-error'>Kein Benutzer gefunden</b>";
		} else {

      $user_id = $user[0]['id'];

			//Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
			$passwordcode = random_string();
      $time = time();

      update_passwordcode($passwordcode, $user_id);

			$empfaenger = $user[0]['email'];
			$betreff = "Neues Passwort für deinen Account auf Kavalier.at"; //Ersetzt hier den Domain-Namen
			$from = "From: Vorname Nachname <noreplay@kavalier.at>"; //Ersetzt hier euren Name und E-Mail-Adresse
			$url_passwortcode = 'index.php?site=pwdupdate&userid='.$user[0]['id'].'&code='.$passwordcode; //Setzt hier eure richtige Domain ein
			$text = 'Hallo '.$user[0]['fullname'].', für deinen Account auf Kavalier.at wurde nach einem neuen Passwort gefragt. Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:'.$url_passwortcode.'

Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.

Liebe Grüße,
dein Kavalier-Team';

			//mail($empfaenger, $betreff, $text, $from);

			$success = "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";
			$showForm = false;
		}
	}
}

?>
