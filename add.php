<?php session_start(); 
  require("connection.php");

  include("head.php");

  include("header.php");

  if(isset($_POST['submit_button'])) {
    $title = $_POST["title"];
    $omschrijving = $_POST["omschrijving"];
    $ingredienten = $_POST["ingredienten"];
    $prijs = $_POST["prijs"];

    if(!empty($title) && !empty($omschrijving) && !empty($ingredienten) && !empty($prijs)) {
      $sql = "INSERT INTO menu(title, omschrijving, ingredienten, prijs) VALUES(:title, :omschrijving, :ingredienten, :prijs)";
      $statement = $conn->prepare($sql);
      if($statement->execute([":title" => $title, ":omschrijving" => $omschrijving, ":ingredienten" => $ingredienten, ":prijs" => $prijs, ])) {
        echo "<center><h1 style='margin-top: 80px;'>Succesvol verstuurd!</h1></center>";
      }
    } else {
      echo "<center><h1 style='margin-top: 80px;'>Alle velden moeten ingevuld zijn.</h1></center>";
    }
  }

  if(isset($_SESSION["username"])) {

?>
  
<main class="add-main">
  <form method="POST" action="add.php" class="add-form">
    Titel: <input type="text" id="title" name="title">
    Omschrijving: <input type="text" id="omschrijving" name="omschrijving">
    Ingredienten: <input type="text" id="ingredienten" name="ingredienten">
    Prijs: <input type="text" id="prijs" name="prijs">
    <button type="submit" style="color: black;" class="index-button add2-button" name="submit_button">Submit</button>
  </form>
</main>

<?php
  } 
  else {
    echo "<center><h1 style='margin-top: 50px;'>Je hebt geen toegang tot de add pagina</h1></center>";
    echo "<center><a href='./login.php'><button style='margin-top: 30px; color: black;' class='index-button'>Log in</button></a></center>";
  }
?>

</body>
</html>