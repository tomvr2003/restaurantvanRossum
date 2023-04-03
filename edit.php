<?php 
session_start(); 
require("connection.php");

$id = $_GET['id'];
$sql = 'SELECT * FROM menu WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute(['id' => $id ]);
$gerecht = $statement->fetch(PDO::FETCH_OBJ);

if(isset($_POST['submit_button'])) {
  $title = $_POST["title"];
  $omschrijving = $_POST["omschrijving"];
  $ingredienten = $_POST["ingredienten"];
  $prijs = $_POST["prijs"];

  $sql = "UPDATE menu SET title=:title, omschrijving=:omschrijving, ingredienten=:ingredienten, prijs=:prijs WHERE id=:id";
  $statement = $conn->prepare($sql);
  $statement->execute([":title" => $title, ":omschrijving" => $omschrijving, ":ingredienten" => $ingredienten, ":prijs" => $prijs, ":id" => $id ]);
  
  header("Location:adminpanel.php");
  exit();
}

include("header.php");
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
<main class="add-main">
  <form method="POST" action="" class="add-form">
    <input type="hidden" name="id" value="<?= $gerecht->id ?>">
    Titel: <input value="<?= $gerecht->title ?>" type="text" id="title" name="title">
    Omschrijving: <input value="<?= $gerecht->omschrijving ?>" type="text" id="omschrijving" name="omschrijving">
    Ingredienten: <input value="<?= $gerecht->ingredienten ?>" type="text" id="ingredienten" name="ingredienten">
    Prijs: <input value="<?= $gerecht->prijs ?>" type="text" id="prijs" name="prijs">
    <button type="submit" name="submit_button">Submit</button>
  </form>
</main>
</body>
</html>