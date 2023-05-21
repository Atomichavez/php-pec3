<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog PHP</title>
</head>
<body>
  <?php
  //Require the necessary files
  require "utilities.php";
  require "fetching.php";

  // Get an array of file paths matching the pattern
  $filePaths = glob('posts/*.json');

  //Run fetchArticles function
  $articles = fetchArticles($filePaths);

  // Default sort order is descending
  $sortOrder = 'date-desc';

  // Check if query is active
  if (isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
  }

  // Sort articles based on sort order
  switch ($sortOrder) {
    case 'date-asc':
      $articles = sortDateAscending($articles);
      break;
    case 'date-desc':
      $articles = sortDateDescending($articles);
      break;
    case 'alpha-asc':
      $articles = sortAlphabeticAscending($articles);
      break;
    case 'alpha-desc':
      $articles = sortAlphabeticDescending($articles);
      break;
    default:
      // Handle default case, sort by date descending
      $articles = sortDateDescending($articles);
      break;
  }

  //Access to the view file
  require "blog.view.php";
  ?>
</body>
</html>