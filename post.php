<?php
//Require the fetching file
require "fetching.php";
require_once "utilities.php";

//Getting the article name to fetch from url
$filename = $_GET['article'];

// Create an array with a single file path
$filePaths = ["posts/{$filename}.json"];

// Use the fetchArticles function to fetch the single article
$articles = fetchArticles($filePaths);

// Retrieve the first article from the array
$article = reset($articles);

//assigning data to variables
$title = $article['title'];
$content = $article['content'];
$dateFormatted = $article['dateFormatted'];
$imgurl = $article['imgurl'];

//Requiring the presentation file
require "post.view.php";