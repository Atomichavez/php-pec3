<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actividad 1</title>
</head>
<body>
  <?php
  //Getting the url's lang
  require_once "utilities.php";
  require_once "fetching.php";
  $lang = getLang();

  // Create an array with a single file path
  $filePaths = ["posts/post_1.json"];

  // Use the fetchArticles function to fetch the single article
  $articles = fetchArticles($filePaths);

  // Retrieve the first article from the array
  $article = reset($articles);

  //assigning data to variables
  $title = $article['title'];
  $content = $article['content'];
  $dateFormatted = $article['dateFormatted'];
  $imgurl = $article['imgurl'];
  ?>
  <script>var baseHref = 'actividad_1.php';</script>
  <script src="utilities.js"></script>
  <?php include "nav.php"; ?>

  <header>
    <select id="lang">
      <option value="es">Spanish</option>
      <option value="en">English</option>
    </select>
  </header>
  <h1><?php echo $title[$lang]; ?></h1>
  <p><?php echo $content[$lang]; ?></p>
</body>
</html>