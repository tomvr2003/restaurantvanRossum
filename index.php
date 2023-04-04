<?php session_start(); 
  require_once('connection.php');

  include("head.php");
?>

<main class="banner">
  <div class="banner-title-con">
    <h1 class="banner-title">Restaurant van Rossum<br><span style="color: #FF9900; font-family: alkatra;">.</span></h1>
    <?php 
    if(isset($_SESSION["username"])) {
      echo "<h2 class='banner-title' style='font-size: 30px';>Welkom " . $_SESSION["username"]. "</h2>";
    }
    ?>
  </div>
  <div class="banner-button-con">
    <a href="./menu.php"><button class="index-button">Menukaart</button></a>
    <?php
    if(!isset($_SESSION["username"])) {
      echo '<a href="./login.php"><button class="index-button">Log in</button></a>';
      echo '<a href="./contact.php"><button class="index-button">Contact</button></a>';
    } else {
      echo '<a href="./logout.php"><button class="index-button">Log out</button></a>';
      echo '<a href="./adminpanel.php"><button class="index-button">Admin Panel</button></a>';
    }
    ?>
  </div>
</main>

</body>
</html>