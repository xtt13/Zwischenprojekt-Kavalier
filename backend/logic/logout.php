<?php
//Session wirklich löschen
session_start();
session_destroy();

redirect_to("../index.php?site=homepage");
?>
