<?php

ini_set("upload_max_filesize", "10M"); // ändert Wert aus php.ini (nur für dieses script)
$filenames_other = [];

$errors = array();
$allowed_file_types = array("image/jpeg", "image/gif", "image/png");
$upload_errors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);


foreach ($_FILES['image2']['name'] as $index => $filename) {
  // dateiname + tmp-name in variablen speichern
  $original_name = $_FILES['image2']['name'][$index];
  $tmp_file = $_FILES['image2']['tmp_name'][$index];

  // prüft ob beim hochladen ein fehler stattgefunden hat
  if($_FILES['image2']['error'][$index] != 0) {
    $errors[$index][] = $upload_errors[$_FILES['image2']['error'][$index]];
  } else {

    // prüft ob mime-type im $allowed_file_types array ist, wenn nicht wird error hinzugefügt
    if(!in_array($_FILES['image2']['type'][$index], $allowed_file_types)) {
      $errors[$index][] = "Dateityp muss jpeg, gif oder png sein.";
    }

    // 1048576 = 1mb; prüft ob datei kleiner als 1mb ist, wenn nicht wird error hinzugefügt
    if($_FILES['image2']['size'][$index] > MAX_FILE_SIZE) {
      $errors[$index][] = "Datei darf nicht größer als 1 MB sein.";
    }

    // wenn für die aktuelle datei keine fehler gesetzt sind bzw. stattgefunden haben
    if(empty($errors[$index])) {
      // ersetzt alle zeichen außer a-z 0-9 - und _ mit einem leerstring ("")
      // für umlaute: php.net http://php.net/manual/de/function.preg-replace.php
      $original_name = preg_replace('/[^a-z0-9.\-_]/i', "", $original_name);

      // verschiebt datei aus dem tmp-verzeichnis in unser gewünschtes verzeichnis (uploads/)
      if(move_uploaded_file($tmp_file, "../images/$original_name")) {

        array_push($filenames_other, $original_name);

        $success_message = "Upload hat geklappt";
      } else {
        $error_message = "Upload hat nicht geklappt";
      }
    }
  }
}

// // error ausgeben
// foreach ($errors as $index => $file_errors) {
//   // dateiname aus superglobal auslesen
//   $filename = $_FILES['image']['name'][$index];
//
//   // fehler nach datei gruppiert ausgeben
//   echo "<p>Fehler bei Datei: $filename</p>";
//   foreach($file_errors as $error) {
//       echo "<p>$error</p>";
//   }
// }


 ?>
