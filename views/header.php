<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://use.typekit.net/jxg7fik.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>
  <meta charset="UTF-8">
  <title>Kavalier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="css/style.css" />

  <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
  <link rel="manifest" href="icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#000000">


  <link rel="apple-touch-startup-image" href="icons/icon.png">
</head>

<body>
  <header class="main-header">
    <h1><a href="index.php">Kavalier</a></h1>
    <nav><ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?site=store">Store</a></li>
      <li><a href="index.php?site=homepage#AboutUs">About Us</a></li>
      <li><a href="index.php?site=homepage#Team">Team</a></li>
      <li><a href="index.php?site=homepage#Location">Location</a></li>
      <li><a href="index.php?site=homepage#Contact">Contact</a></li>
    </ul>
  </nav>
    <a class="cart" href="index.php?site=bag">
      <p>
      <?php if(isset($_SESSION['bag'])){echo  count($_SESSION['bag']);} else { echo '0';}?>
    </p>
    </a>
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
      echo"<a class='signin' href='index.php?site=account'>Account</a>";
      echo"<a class='logout-header' href='index.php?site=logout'>Logout</a>";
    } else {
      echo"<a class='signin' href='index.php?site=login&amp;action=useraccount'>Sign In/Register</a>";

    }

     ?>

    <div class="nav-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
