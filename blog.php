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

  //Rearranging array by date
  usort($articles, function($a, $b) {
    if ($a["dateFormatted"] == $b["dateFormatted"]) {
      return 0;
    } elseif ($a["dateFormatted"] < $b["dateFormatted"]) {
      return -1;
    } else {
      return 1;
    }
  });

  //Looping through articles to display them
  foreach ($articles as $article) {
    $filename = $article["filename"];
    $title = $article["title"];
    $dateFormatted = $article["dateFormatted"];
    $contentNew = $article["contentNew"];
    $imgurl = $article["imgurl"];
    ?>
    <h1><a href="post.php?article=<?php echo $filename; ?>"><?php echo $title; ?></a></h1>
    <time datetime="<?php echo $dateFormatted; ?>"><?php echo $dateFormatted; ?></time>
    <p><?php echo $contentNew; ?></p>
    <img src="<?php echo $imgurl; ?>" alt="news Image" width="500px">
    <hr>
  <?php
  }
  ?>
</body>
</html>