<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_GET['article']; ?></title>
</head>
<body>
  <script>var baseHref = 'post.php';</script>
  <script src="utilities.js"></script>
  <?php include "nav.php"; ?>

  <select id="lang">
    <option value="es">Spanish</option>
    <option value="en">English</option>
  </select>

  <?php
  require_once "utilities.php";
  $lang = getLang();
  ?>

  <h1><?php echo $title[$lang]; ?></h1>
  <time datetime="<?php echo $dateFormatted; ?>"><?php echo $dateFormatted; ?></time>
  <p><?php echo $content[$lang]; ?></p>
  <img src="<?php echo $imgurl; ?>" alt="news Image">
</body>
</html>