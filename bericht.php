<?php session_start(); 
require("connection.php");

$id = $_GET['id'];
$sql = 'SELECT * FROM contact WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute(['id' => $id ]);
$contact = $statement->fetch(PDO::FETCH_OBJ);

include("header.php");

include("head.php");

if(isset($_SESSION["username"])) {
?>

<main class="bericht-main">
  <div class="wrapper-bericht">
    <div class="container-bericht">
      <div class="bericht-naam-con"><h4 style="margin-right: 10px;">Naam:</h4><p><?= $contact->naam ?></p></div>
      <div class="bericht-email-con"><h4 style="margin-right: 10px;">Email:</h4><p><?= $contact->email ?></p></div>
      <div class="bericht-onderwerp-con"><h4 style="margin-right: 10px;">Onderwerp:</h4><p><?= $contact->onderwerp ?></p></div>
      <div class="bericht-bericht-con"><h4 style="margin-bottom: 10px; text-decoration: underline 2px solid #FF9900;">Bericht:</h4><p><?= $contact->bericht ?></p></div>
    </div>
  </div>
  <div class="button-con-bericht">
  <a href="./deletebericht.php?id=<?= $contact->id ?>"><button class="bericht-button bericht-button">Gelezen</button></a>
  <a href="./deletebericht.php?id=<?= $contact->id ?>"><button class="bericht-button bericht-button-red">Verwijderen</button></a>
  </div>
</main>

<?php 
  }
  else {
    echo "<center><h1 style='margin-top: 50px;'>Je hebt geen permissie om deze mail te bekijken</h1></center>";
    echo "<center><a href='./login.php'><button style='margin-top: 30px; color: black;' class='index-button'>Log in</button></a></center>";
  }
?>
</body>
</html>