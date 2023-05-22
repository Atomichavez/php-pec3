<?php
session_start();
require_once "utilities.php";
$lang = getLang();

$greeting = '';
if (isset($_SESSION['username'])) {
  $greeting = "Hello, " . $_SESSION['username'];
}

if($lang == 'en') {
  ?>
  <nav>
    <?php if ($greeting != '') echo $greeting; ?>
    <ul>
      <li><a href="blog.php">Home</a></li>
      <li><a href="actividad_1.php">Activity 1</a></li>
      <li><a href="/~davidchavez/pec3/api/noticias/es/api.php">API</a></li>
      <?php if (!isset($_SESSION['username'])): ?>
        <li><a href="login.php">Login</a></li>
      <?php else: ?>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <?php
} else {
  ?>
  <nav>
  <?php if ($greeting != '') echo $greeting; ?>
  <ul>
    <li><a href="blog.php">Inicio</a></li>
    <li><a href="actividad_1.php">Actividad 1</a></li>
    <li><a href="/~davidchavez/pec3/api/noticias/es/api.php">API</a></li>
    <?php if (!isset($_SESSION['username'])): ?>
      <li><a href="login.php">Acceso</a></li>
    <?php else: ?>
      <li><a href="profile.php">Perfil</a></li>
      <li><a href="logout.php">Salir</a></li>
    <?php endif; ?>
  </ul>
</nav>
<?php
}
?>