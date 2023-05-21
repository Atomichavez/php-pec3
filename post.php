<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_GET['article']; ?></title>
</head>
<body>
<?php
    $filename = $_GET['article'];
    $jsonData = file_get_contents("posts/{$filename}.json");
    $data = json_decode($jsonData);
    $title = $data->title->es;
    $content = $data->description->es;
    $dateFormatted = date('d/m/Y', $data->date);
    $imgurl = $data->image;
?>
  <h1><?php echo $title; ?></h1>
  <time datetime="<?php echo $dateFormatted; ?>"><?php echo $dateFormatted; ?></time>
  <p><?php echo $content; ?></p>
  <img src="<?php echo $imgurl; ?>" alt="news Image">
</body>
</html>