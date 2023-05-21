<?php

function fetchArticles($filePaths) {
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

    // Get the filename without extension
    $filename = pathinfo($filePath, PATHINFO_FILENAME);

    // Create an array representing the article
    $article = array(
      "filename" => $filename,
      "title" => $title,
      "content" => $content,
      "dateFormatted" => $dateFormatted,
      "imgurl" => $imgurl
    );

    // Add this article to the larger array
    array_push($articles, $article);
  }

  //Return statement
  return ($articles);
}