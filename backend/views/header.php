<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Kavalier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="../backend/css/backend-style.css" />

  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <script src="https://use.typekit.net/rse4oyh.js"></script>
  <script>
    try {
      Typekit.load({
        async: true
      });
    } catch (e) {}
  </script>

</head>

<body>
  <header class="main-header">
    <h1><a href="index.php">Kavalier</a></h1>
    <nav><ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?site=statistics">Statistics</a></li>
      <li><a href="index.php?site=orders">Orders</a></li>
      <li><a href="index.php?site=users&amp;action=view">Users</a></li>
      <li><a href="index.php?site=products&amp;action=view">Products</a></li>
    </ul>
  </nav>
    <!-- <a class="cart" href="index.php?site=bag">
      <?php if(isset($_SESSION['bag'])){echo '<p>' . count($_SESSION['bag']) . '</p>';}?>
    </a> -->


    <a class="signin" href="index.php?site=login&amp;action=useraccount">Sign In/Register</a>
    <div class="nav-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
