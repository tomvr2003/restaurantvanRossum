<?php session_start(); 
  require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if(isset($_POST['submit_button'])) {
  $title = $_POST["title"];
  $omschrijving = $_POST["omschrijving"];
  $ingredienten = $_POST["ingredienten"];
  $prijs = $_POST["prijs"];

  $sql = "INSERT INTO menu(title, omschrijving, ingredienten, prijs) VALUES(:title, :omschrijving, :ingredienten, :prijs)";
  $statement = $conn->prepare($sql);
  $statement->execute([":title" => $title, ":omschrijving" => $omschrijving, ":ingredienten" => $ingredienten, ":prijs" => $prijs, ]);
  header("location:menu.php");
}

include("header.php");

?>
  
<main class="add-main">
  <form method="POST" action="add.php" class="add-form">
    Titel: <input type="text" id="title" name="title">
    Omschrijving: <input type="text" id="omschrijving" name="omschrijving">
    Ingredienten: <input type="text" id="ingredienten" name="ingredienten">
    Prijs: <input type="text" id="prijs" name="prijs">
    <button type="submit" name="submit_button">Submit</button>
  </form>
</main>

</body>
</html>