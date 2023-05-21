<?php
require_once "utilities.php";
$lang = getLang();
if($lang == 'en') {
  ?>
  <nav>
  <ul>
    <li><a href="blog.php">Home</a></li>
    <li><a href="actividad_1.php">Activity 1</a></li>
    <li><a href="">API</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="perfil.php">Profile</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
  <?php
} else {
  ?>
  <nav>
  <ul>
    <li><a href="blog.php">Inicio</a></li>
    <li><a href="actividad_1.php">Actividad 1</a></li>
    <li><a href="">API</a></li>
    <li><a href="login.php">Acceso</a></li>
    <li><a href="perfil.php">Perfil</a></li>
    <li><a href="logout.php">Salir</a></li>
  </ul>
</nav>
<?php
}
?>