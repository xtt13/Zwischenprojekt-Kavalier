<?php


if(!isset($_GET['userid']) || !isset($_GET['code'])) {
	die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}

$userid = $_GET['userid'];
$code = $_GET['code'];

$user = get_user($userid);

//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein Passwortcode hat
if($user === null || $user[0]['passwordcode'] === null) {
	die("Es wurde kein passender Benutzer gefunden");
}

if($user[0]['passwordcode_time'] === null || strtotime($user[0]['passwordcode_time']) < (time()-24*3600) ) {
	die("Dein Code ist leider abgelaufen");
}


//Überprüfe den Passwortcode
if($code != $user[0]['passwordcode']) {
	die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['send'])) {
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];

	if($passwort != $passwort2) {
		echo "Bitte identische Passwörter eingeben";
	} else { //Speichere neues Passwort und lösche den Code

		$password_hash = password_hash($passwort, PASSWORD_DEFAULT);
    update_password($password_hash, $user[0]['id']);
    $update_password = true;

	}
}
?>
