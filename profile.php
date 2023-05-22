<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>
<body>
<?php
  include "nav.php";

  //Check if logged in
  if (!isset($_SESSION['username'])) {
    echo 'You are not logged in.';
    exit;
  }

  // Load users.json file
  $data = file_get_contents('users.json');
  $user = json_decode($data, true);
?>
  <h1>Profile</h1>
  <p>Hello <?php echo $user['username']; ?><p>
  <p>Your encrypted password is <?php echo $user['password']; ?><p>
  <img src="https://scontent.fntr6-4.fna.fbcdn.net/v/t31.18172-1/10431366_10154796612810311_3333583575635253197_o.jpg?stp=dst-jpg_p200x200&_nc_cat=104&ccb=1-7&_nc_sid=7206a8&_nc_eui2=AeE4lVuNqFUN5Q5hpexSJCTeVFjCiZvVONlUWMKJm9U42WQdiKvtsXURh_SXB9xCS48&_nc_ohc=VF4G2IEbIXEAX8n9qdF&_nc_ht=scontent.fntr6-4.fna&oh=00_AfBGT7bXvFhWraeCR53ry6Of1N8z5FLj6jtDISUyAWbuHA&oe=64925918" alt="david y cuatro patos">
</body>
</html>