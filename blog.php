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


  require "utilities.php";

  // Get an array of file paths matching the pattern
  $filePaths = glob('posts/*.json');

  // Create an array to store the article data
  $articles = array();

  // Loop through each file
  foreach ($filePaths as $filePath) {
    // Read the JSON file contents
    $jsonData = file_get_contents($filePath);

    // Parse the JSON data
    $data = json_decode($jsonData);

    // Access desired properties
    $title = $data->title->es;
    $content = $data->description->es;
    $dateFormatted = date('d/m/Y', $data->date);
    $imgurl = $data->image;

    // Check if content needs to be trimmed
    $contentArr = explode(' ', $content);
    if(count($contentArr)>120){
        $contentTrim = array_slice($contentArr, 0, 120);
        $contentNew = implode(' ', $contentTrim);
    } else {
        $contentNew = $content;
    }

    // Get the filename without extension
    $filename = pathinfo($filePath, PATHINFO_FILENAME);

    // Create an array representing the article
    $article = array(
      "filename" => $filename,
      "title" => $title,
      "contentNew" => $contentNew,
      "dateFormatted" => $dateFormatted,
      "imgurl" => $imgurl
    );

    // Add this article to the larger array
    array_push($articles, $article);
  }

  //Rearranging array by date ascending
  function sortDateAscending($articles) {
    usort($articles, function($a, $b) {
      if ($a["dateFormatted"] == $b["dateFormatted"]) {
        return 0;
      } elseif ($a["dateFormatted"] < $b["dateFormatted"]) {
        return -1;
      } else {
        return 1;
      }
    });
    return $articles;
  }

  //Rearranging array by date descending
  function sortDateDescending($articles) {
    usort($articles, function($a, $b) {
      if ($a["dateFormatted"] == $b["dateFormatted"]) {
        return 0;
      } elseif ($a["dateFormatted"] < $b["dateFormatted"]) {
        return 1;
      } else {
        return -1;
      }
    });
    return $articles;
  }

  //Rearranging array by alphabetic ascending
  function sortAlphabeticAscending($articles) {
    usort($articles, function($a, $b) {
      return strcmp($a["title"], $b["title"]);
    });
    return $articles;
  }

  //Rearranging array by alphabetic descending
  function sortAlphabeticDescending($articles) {
    usort($articles, function($a, $b) {
      return strcmp($b["title"], $a["title"]);
    });
    return $articles;
  }

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