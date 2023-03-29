<?php 

  require_once('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menukaart</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <?php 
  
    include_once("header.php");
      
  ?>

  <main>

    <form class="search-bar-con" method="POST">
      <input class="search-bar" name="zoekveld" type="text" placeholder="Zoek uw gerecht..">
      <button class="index-button search-button" type="submit">Zoek</button>
    </form>

    <?php 

    if (isset($_POST['zoekveld'])) {
      $zoekveld = $_POST['zoekveld'];
      $stmt = $conn->query("SELECT * FROM `menu` WHERE `title` LIKE '%$zoekveld%'");
    }
    else {
      $stmt = $conn->query("SELECT * FROM `menu`");
    }

      while ($row = $stmt->fetch()) {
    ?>

    <div class="boxes-container">
      <div class="left-box">
        <div class="box-left">
          <div class="box-left-top">
            <h2 class="box-left-title"><?php echo $row["title"]; ?></h2>
          </div>
          <div class="box-left-mid">
            <p class="box-left-omschrijving"><?php echo $row["omschrijving"]; ?></p>
          </div>
          <div class="box-left-low">
            <p class="box-left-gerecht"><?php echo $row["ingredienten"]; ?></p>
          </div>
          <div class="box-left-bottom">
            <h2 class="box-left-prijs">€ <?php echo $row["prijs"]; ?></h2>
          </div>
        </div>
      </div>
    </div>

    <?php 
      }
    ?>

    <div style="height: 30px;"></div>

  </main>
</body>
</html>