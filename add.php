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
  // Connectie database

  $servername = "localhost";
  $username = "root";
  $password = "";

  $connectie = new PDO("mysql:host=$servername; dbname=webapp1", $username, $password);

  // Informatie toevoegen database

  $title = $_POST["title"];
  $omschrijving = $_POST["omschrijving"];
  $ingredienten = $_POST["ingredienten"];
  $prijs = $_POST["prijs"];

  $statement = $connectie->prepare("INSERT INTO menu(title, omschrijving, ingredienten, prijs) VALUES(?, ?, ?, ?)");
  $statement->execute([$title, $omschrijving, $ingredienten, $prijs]);

}

include("header.php");

?>
  
<main class="add-main">
  <form method="POST" action="add.php" class="add-form">
    Titel: <input type="text" name="title">
    Omschrijving: <input type="text" name="omschrijving">
    Ingredienten: <input type="text" name="ingredienten">
    Prijs: <input type="text" name="prijs">
    <button type="submit" name="submit_button">Submit</button>
  </form>
</main>

</body>
</html>