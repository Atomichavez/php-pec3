<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_GET['article']; ?></title>
</head>
<body>
  <select id="lang">
    <option value="es">Spanish</option>
    <option value="en">English</option>
  </select>

  <script>
    document.getElementById('lang').addEventListener('change', function() {
    var selectedValue = this.value;
    window.location.href = 'blog.php?sortOrder=' + encodeURIComponent(selectedValue);
  });
  </script>

  <h1><?php echo $title; ?></h1>
  <time datetime="<?php echo $dateFormatted; ?>"><?php echo $dateFormatted; ?></time>
  <p><?php echo $content; ?></p>
  <img src="<?php echo $imgurl; ?>" alt="news Image">
</body>
</html>