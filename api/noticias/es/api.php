<?php

// Initialize an empty array to store the posts
$posts = [];

// Get all the '.json' files from the posts directory
$files = glob('../../../posts/' . '*.json');

// Loop through the files
foreach($files as $file) {
  // Get the contents of the file
  $file_content = file_get_contents($file);

  // Decode the JSON into an associative array
  $post = json_decode($file_content, true);

  // Remove English language content
  unset($post['title']['en']);
  unset($post['description']['en']);

  // Add the post to the array of posts
  array_push($posts, $post);
}

// Convert the array of posts to JSON
$posts_json = json_encode($posts);

// Output the JSON
echo $posts_json;