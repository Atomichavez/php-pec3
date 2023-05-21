<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog PHP</title>
</head>
<body>
  <!-- Importing the updateLocation function that makes the select work -->
  <script src="utilities.js"></script>

  <header>
    <select id="sortOrder">
      <option value="" disabled selected hidden>Filter</option>
      <option value="date-desc">Date Descending</option>
      <option value="date-asc">Date Ascending</option>
      <option value="alpha-asc">Alphabetic Ascending</option>
      <option value="alpha-desc">Alphabetic Descending</option>
    </select>
    <select id="lang">
      <option value="es">Spanish</option>
      <option value="en">English</option>
    </select>
  </header>

  <?php foreach ($articles as $article) : ?>
    <h1><a href="post.php?article=<?php echo $article['filename']; ?>"><?php echo $article['title']; ?></a></h1>
    <time datetime="<?php echo $article['dateFormatted']; ?>"><?php echo $article['dateFormatted']; ?></time>
    <p><?php echo $article['content']; ?></p>
    <img src="<?php echo $article['imgurl']; ?>" alt="news Image" width="500px">
    <hr>
  <?php endforeach; ?>
</body>
</html>