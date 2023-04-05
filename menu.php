<?php 

  require_once('connection.php');

  include("head.php");

  include_once("header.php");  
?>

  <main>

    <?php 
      if (isset($_POST['zoekveld']) && !empty($_POST['zoekveld'])) {
        $zoekveld = $_POST['zoekveld'];
        $stmt = $conn->prepare("SELECT * FROM `menu` WHERE `title` LIKE ?");
        $stmt->execute(["%$zoekveld%"]);
      }
      else if (isset($_POST['zoekveld']) && empty($_POST['zoekveld']) && isset($_POST['sub-but'])) {
        echo "<center><h2 style='margin-bottom: 50px'>Zoekbalk is leeg, voer iets in om resultaat te krijgen.</h2></center>";
        $stmt = $conn->query("SELECT * FROM `menu`");
      }
      else {
        $stmt = $conn->query("SELECT * FROM `menu`");
      }

      if ($stmt->rowCount() == 0) {
        echo "<center><h2 style='margin-bottom: 50px'>Geen resultaten gevonden.</h2></center>";
      }
    ?>

    <form class="search-bar-con" method="POST">
      <input class="search-bar" name="zoekveld" type="text" placeholder="Zoek uw gerecht..">
      <button class="index-button search-button" name="sub-but" type="submit">Zoek</button>
    </form>

    <?php
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
            <h2 style="color: #FF9900;" class="box-left-prijs">€ <?php echo $row["prijs"]; ?></h2>
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