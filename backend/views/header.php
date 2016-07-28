<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Kavalier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <link rel="stylesheet" href="../backend/css/backend-style.css" />
  <meta name="robots" content="noindex" />
  <link rel="apple-touch-icon" sizes="57x57" href="../icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
  <link rel="manifest" href="../icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <script src="https://use.typekit.net/jxg7fik.js"></script>
  <script>try{Typekit.load({ async: true });}catch(e){}</script>

</head>

<body>
  <header class="main-header">
    <h1><a href="../index.php">Kavalier</a></h1>
    <nav><ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php?site=statistics">Statistics</a></li>
      <li class='messages'><a href="index.php?site=orders&amp;action=view">Orders</a><span class='messages-counter-orders'><?php if(isset($number_orders)){echo $number_orders;} ?></span></li>
      <li><a href="index.php?site=users&amp;action=view">Users</a></li>
      <li><a href="index.php?site=products&amp;action=view">Products</a></li>
      <li><a href="index.php?site=search">Search</a></li>
      <li class='messages'><a href="index.php?site=messages">Messages</a><span class='messages-counter'><?php if(isset($number)){echo $number;} ?></span></li>
    </ul>
  </nav>

    <a class="login" href="index.php?site=logout&amp;action=logout">Logout</a>
    <div class="nav-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
