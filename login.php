<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
<?php include "nav.php"; ?>
<form action="login.php" method="POST">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>
  <br>
  <input type="submit" value="Submit">
</form>
<?php
  // If form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Load users.json file
    $data = file_get_contents('users.json');
    $users = json_decode($data, true);

    // Validate username
    if ($_POST['username'] == $users['username']) {
      // Validate password
      if (password_verify($_POST['password'], $users['password'])) {
        // Valid credentials: set session variable and redirect to welcome page
        $_SESSION['username'] = $users['username'];
        header("Location: profile.php");
      } else {
        echo 'Invalid credentials.';
      }
    } else {
      echo 'Invalid credentials.';
    }
  }
?>

</body>
</html>

